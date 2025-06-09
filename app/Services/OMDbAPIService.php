<?php

namespace App\Services;

use App\Contracts\MovieAPIService;
use App\DTOs\OMDbAPIMovieDTO;
use App\DTOs\OMDbAPISearchResultDTO;
use App\Exceptions\OMDbAPIException;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class OMDbAPIService implements MovieAPIService
{
    private string $api_key;
    private string $base_url;
    private array $cache_ttl;

    public function __construct()
    {
        $this->api_key = config('services.omdb_api.key');
        $this->base_url = config('services.omdb_api.base_url');
        $this->cache_ttl = config('services.omdb_api.cache_ttl');
    }

    public function searchByTitle(string $title, ?array $options = []): OMDbAPISearchResultDTO
    {
        $response = $this->get(array_merge($options, [
            's' => $title,
        ]));

        return OMDbAPISearchResultDTO::fromOMDbAPIResponseData($response->json());
    }

    public function findByTitle(string $title, ?array $options = []): OMDbAPIMovieDTO
    {
        $cache_key = 'omdb_api_movie_' . Str::slug($title);

        return Cache::flexible($cache_key, $this->cache_ttl, function () use ($title, $options) {
            $response = $this->get(array_merge($options, [
                't' => $title,
            ]));

            return OMDbAPIMovieDTO::fromOMDbAPIResponseData($response->json());
        });
    }

    public function findByIMDbId(string $imdb_id, ?array $options = []): OMDbAPIMovieDTO
    {
        $cache_key = 'omdb_api_movie_' . $imdb_id;

        return Cache::flexible($cache_key, $this->cache_ttl, function () use ($imdb_id, $options) {
            $response = $this->get(array_merge($options, [
                'i' => $imdb_id,
            ]));

            return OMDbAPIMovieDTO::fromOMDbAPIResponseData($response->json());
        });
    }

    /** @throws OMDbAPIException */
    private function get(array $options = []): PromiseInterface|Response
    {
        try {
            $response = Http::get($this->base_url, array_merge($options, [
                'apiKey' => $this->api_key,
                'type' => 'movie',
            ]));

            if ($response->failed()) {
                throw new OMDbAPIException($response->body());
            }

            $data = $response->json();

            if(isset($data['Response']) && $data['Response'] === 'False') {
                throw new OMDbAPIException($data['Error']);
            }
        } catch (\Exception $e) {
            throw new OMDbAPIException($e->getMessage(), $e->getCode(), $e);
        }

        return $response;
    }
}
