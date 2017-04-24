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
use App\Story;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Story::class, function (Faker\Generator $faker) {
	//title and slug
	$title = ucwords($faker->words(
		$nbWords = $faker->numberBetween(1,5),
		$variableNbWords = true,
		$asText = true
	));
	$title_slug = str_slug($title);

	//cover image
	$dimensions = Story::coverDimensions();
	$img_width = $faker->numberBetween(
			$dimensions['min_width'],
			$dimensions['max_width']
		);
	$ratio = $dimensions['min_width']/$faker->numberBetween(
			$dimensions['min_width'],
			$dimensions['max_width']
		);
	$cover = $faker->image(
		$dir = 'storage\app\public\covers',
		$width = $img_width,
		$height = round($img_width / $ratio),
		'nature',
		false,
		true,
		rawurlencode($title) //add title to image for mocking it
	);

	//publication date
	$pub_date = $faker->dateTime(
        	$max = 'now',
        	$timezone = date_default_timezone_get()
    	 )->format('Y-m-d H:i:s');

	//story intro
	$intro = $faker->paragraphs($nb = 2, $asText = true);

    return [
        'title' => $title,
        'title_slug' => $title_slug,
        'intro' => $intro,
        'pub_date' => $pub_date,
        'cover_filename' => $cover,
        'genre_id' => App\Genre::all()->random()->id
    ];
});
