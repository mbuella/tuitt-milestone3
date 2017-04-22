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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Chapter::class, function (Faker\Generator $faker) {

	$title = ucwords($faker->words(
		$nbWords = $faker->numberBetween(1,5),
		$variableNbWords = true,
		$asText = true
	));

	$text = $faker->paragraphs(
		$nb = $faker->numberBetween(3,6),
		$asText = true
	);

	$sort_id = session('sort_id');
	//increment story_id for next story
	session(['sort_id' => ++$sort_id]);

    return [
        'sort_id' => $sort_id,
        'title' => $title,
        'text' => $text
    ];
});
