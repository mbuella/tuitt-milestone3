<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    private function createGenres() {
        $genres = [
            [
                'genre_name' => 'classics',
                'genre_slug' => 'classics'
            ],
            [
                'genre_name' => 'fantasy',
                'genre_slug' => 'fantasy'
            ],
            [
                'genre_name' => 'history',
                'genre_slug' => 'history'
            ],
            [
                'genre_name' => 'horror',
                'genre_slug' => 'horror'
            ],
            [
                'genre_name' => 'poetry',
                'genre_slug' => 'poetry'
            ],
            [
                'genre_name' => 'romance',
                'genre_slug' => 'romance'
            ],
            [
                'genre_name' => 'science fiction',
                'genre_slug' => 'science-fiction'
            ],
            [
                'genre_name' => 'humor',
                'genre_slug' => 'humor'
            ],
            [
                'genre_name' => 'short story',
                'genre_slug' => 'short-story'
            ]
        ];

        return App\Genre::insert($genres);
    }

    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('genre_name');
            $table->string('genre_slug');
        });

        $this->createGenres();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genres');
    }
}
