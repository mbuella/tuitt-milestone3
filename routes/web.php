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


/*** Chapter Routes ***/
Route::post('/story/{story_slug}/delete',
	'ChapterController@delete'
);

Route::post('/story/{story_slug}/chapter/{chapter_id}/delete',
	'ChapterController@delete'
);

Route::post('/story/{story_slug}/edit',
	'ChapterController@chapterEditModal'
);

Route::post('/story/{story_slug}/chapter/{chapter_id}/edit',
	'ChapterController@chapterEditModal'
);

Route::post('/story/{story_slug}/chapter/{chapter_id}/save',
	'ChapterController@saveChapter'
);

/*** Authors Routes ***/
Route::get('/authors',
	'AuthorsController@index'
);


Auth::routes();


/*** Member Dashboard ***/
Route::get('/home', 'HomeController@index');
