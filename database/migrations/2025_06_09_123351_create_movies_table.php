<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('imdb_id')->unique()->index();
            $table->string('title');
            $table->string('poster_url')->nullable();
            $table->string('plot')->nullable();
            $table->timestamps();
        });
    }
};
