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
$factory->define(App\Author::class, function (Faker\Generator $faker) {
	//pen name
	$first_name = $faker->firstName();
	$last_name = $faker->optional()->lastName();
	$name = "$first_name $last_name";

	//the avatar
	$avtr_width = 150; 
	$avtr_height = 150;

/*	//Avatars generated from Robohash.org
	$avtr_name = $faker->uuid;
	$url = "https://robohash.org/{$avtr_name}.png?size={$avtr_width}x{$avtr_height}&set=set2";
	$temp_path = "storage/app/public/temp/{$avtr_name}.png";

	set_time_limit(0); 
	//download avatar in temp directory
	$file = copy($url,$temp_path);
	//copy the file with auto id using Storage class
	$avatar = Storage::disk('public')->putFile('avatars/authors', new File($temp_path));
	//delete temp image
	unlink($temp_path);*/

	$avatar = $faker->image(
		$dir = 'storage\app\public\avatars\authors',
		$width = $avtr_width,
		$height = $avtr_height,
		'animals',
		false,
		true
	);

    return [
        'pen_name' => $name,
        'avatar' => $avatar
    ];
});
