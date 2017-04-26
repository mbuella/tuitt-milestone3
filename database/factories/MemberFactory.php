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
$factory->define(App\Member::class, function (Faker\Generator $faker) {

	//generate the gender
	$gend = $faker->randomElement($array = 
		[
			[
				'gender' => 'male',
				'code' => 'm'
			],
			[
				'gender' => 'female',
				'code' => 'f'
			]
		]
	);

	//the avatar
	$avtr_width = 150; 
	$avtr_height = 150;

/*	$avtr_name = $faker->uuid;
	//Avatars generated from Robohash.org
	$url = "https://robohash.org/{$avtr_name}.png?size={$avtr_width}x{$avtr_height}";
	$temp_path = "storage/app/public/temp/{$avtr_name}.png";

	//set_time_limit(0); 
	//download avatar in temp directory
	// $file = copy($url,$temp_path);
	$file = value(function() use($url,$temp_path) {
        $fp = fopen($temp_path, 'w');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        $success = curl_exec($ch);
        dd($success);
        curl_close($ch);
        fclose($fp);

	    return $temp_path;
	});

	dd('stop');
	
	//copy the file with auto id using Storage class
	$avatar = Storage::disk('public')->putFile('avatars/members', new File($temp_path));
	//delete temp image
	unlink($temp_path);*/

	$avatar = $faker->image(
		$dir = 'storage\app\public\avatars\members',
		$width = $avtr_width,
		$height = $avtr_height,
		'people',
		false,
		true
	);

    return [
        'member_fname' => $faker->firstName($gender = $gend['gender']),
        'member_lname' => $faker->lastName,
        'member_addr' => $faker->optional()->address,
        'member_dbirth' => $faker->optional()->date($format = 'Y-m-d', $max = 'now'),
        'member_gender' => $gend['code'],
        'avatar' => $avatar
    ];
});
