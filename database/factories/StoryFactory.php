<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Illuminate\Http\File;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Story::class, function (Faker\Generator $faker) {
	//pre-process titles and slugs
	$title = ucwords($faker->words(
		$nbWords = $faker->numberBetween(1,5),
		$variableNbWords = true,
		$asText = true
	));
	$title_slug = str_slug($title);
	$cover = $faker->image(
		$dir = 'storage\app\public\covers',
		$width = 300,
		$height = $faker->numberBetween(300,500),
		'nature',
		false,
		true,
		rawurlencode($title) //add title to image for mocking it
	);
	$pub_date = $faker->dateTime(
        	$max = 'now',
        	$timezone = date_default_timezone_get()
    	 )->format('Y-m-d H:i:s');
	$intro = $faker->paragraphs($nb = 2, $asText = true);

	//dd($pub_date->format('Y-m-d H:i:s'));

    return [
        'title' => $title,
        'title_slug' => $title_slug,
        'intro' => $intro,
        'pub_date' => $pub_date,
        'cover_filename' => $cover,

        'genre_id' => App\Genre::all()->random()->id
        //'author_id' => App\Author::all()->random()->id
    ];
});
