<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();
    	// generate authors
		//$authors = factory(App\Author::class, 5)->create();
    	// generate stories
		//$stories = factory(App\Story::class, 50)->create();
        // generate chapters
		$chapters = factory(App\Chapter::class, 5)->create();
    }
}
