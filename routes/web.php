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

//also catch urls with no slugs but chapter already indicated
/*Route::get('/story/{story}/chapter/{chapter}',
	'StoryController@getChapter'
);
*/
Route::get('/story/{story_slug}/chapter/{chapter}',
	'StoryController@index'
);

/*** Authors Routes ***/
Route::get('/authors',
	'AuthorsController@index'
);


Auth::routes();


/*** Member Dashboard ***/
Route::get('/home', 'HomeController@index');
