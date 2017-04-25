<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*** INDEX PAGE ***/
Route::get('/', function () {
    return view('welcome');
});

/*** LOGOUT ***/
Route::get('/logout',function(){
	Auth::logout();
	return redirect('/');
});


/*** About page ***/
Route::get('/about',function(){
	return view('about');
});


/*** Stories Routes ***/
Route::get('/stories/',
	'StoriesController@index'
);

Route::get('/stories/{genre_name}',
	'StoriesController@getStories'
);


/*** Story Page Routes ***/
Route::get('/story/{story_slug}/',
	'StoryController@index'
);

Route::get('/story/{story_slug}/chapter/{chapter}',
	'StoryController@index'
);

/** Story update **/

Route::post('/story/{story_slug}/update_modal',
	'StoryController@storyUpdateModal'
);

Route::post('/story/{story}/update',
	'StoryController@storyUpdate'
);

/*** Chapter Routes ***/

/** Chapter insert **/

Route::post('/story/{story_slug}/add',
	'ChapterController@chapterAddModal'
);

Route::post('/story/{story_slug}/chapter/{chapter}/add',
	'ChapterController@chapterAddModal'
);

Route::post('/story/{story_slug}/chapter/{chapter}/insert',
	'ChapterController@insertChapter'
)->middleware('can:update-chapter,chapter');
//we can use update-chapter since we already allowed the user to add
//chapter

/** Chapter update **/

Route::post('/story/{story_slug}/edit',
	'ChapterController@chapterEditModal'
);

Route::post('/story/{story_slug}/chapter/{chapter}/edit',
	'ChapterController@chapterEditModal'
);

Route::post('/story/{story_slug}/chapter/{chapter}/save',
	'ChapterController@saveChapter'
)->middleware('can:update-chapter,chapter');

/** Chapter delete **/

Route::post('/story/{story_slug}/delete',
	'ChapterController@delete'
);

Route::post('/story/{story_slug}/chapter/{chapter}/delete',
	'ChapterController@delete'
);


/*** Authors Routes ***/

Route::get('/authors',
	'AuthorsController@index'
);


Auth::routes();


/*** Current Login Dashboard ***/
Route::get('/home', 'HomeController@index');

/*** Member Profile ***/
# Route::get('/{user_name}', 'ProfileController@index');

/*** Member authors page (by authors) ***/
/*Route::get('/{user_name}/{story_slug}/chapter/{chapter_id}/delete',
	'ChapterController@delete'
);*/