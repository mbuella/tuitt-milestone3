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

    return [
        'member_fname' => $faker->firstName($gender = $gend['gender']),
        'member_lname' => $faker->lastName,
        'member_addr' => $faker->address,
        'member_dbirth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'member_gender' => $gend['code']
    ];
});
