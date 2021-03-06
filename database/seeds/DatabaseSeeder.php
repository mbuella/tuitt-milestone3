<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	//seeder models
	//seeder vars	
	private $user_count;
	private $auth_count;
	private $story_count;
	private $chapter_count;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->user_count = 3;
    	$this->auth_count = [2,3]; //range of author count per user
    	$this->story_count = [1,2]; //range of story count per author
    	$this->chapter_count = [4,10]; //range of chapter count per story

    	//create faker factory
    	$faker = Faker\Factory::create();

    	//generate users
		$users = factory(App\User::class, $this->user_count)->create();
		dump('Users generated to database.');

		//generate members
		$members = $users->each(function($u){
			$u->member()->save(
				factory(App\Member::class)->make()
			);
		});
		
		dump('Members generated to database.');

    	// generate authors
    	$authors = $users->each(function($u){
			$authors = $u->authors()->saveMany(
				factory(
					App\Author::class,
					rand($this->auth_count[0],$this->auth_count[1])
				)->make()
			);

			dump('Authors generated to database.');

	    	$authors->each(function($v){

		    	// generate stories
				$stories = $v->stories()->saveMany(
					factory(
						App\Story::class,
						rand($this->story_count[0],$this->story_count[1])
					)->make()
				);
				dump('Stories generated to database.');
				
				//generate chapters
				$stories->each(function($v){
					//reset sort id to 0
					session(['sort_id' => 0]);
					$chapters = $v->chapters()->saveMany(
						factory(
							App\Chapter::class,
							rand($this->chapter_count[0],$this->chapter_count[1])
						)->make()
					);	
					dump('Chapters generated to database.');					
				});

			});

		});
    }
}
