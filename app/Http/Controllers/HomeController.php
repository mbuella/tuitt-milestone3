<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * When a user is logged in
     * Instead of the welcome page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ctrlr = $this;

        //get current user
        $user = Auth::user();

        //get the member
        $member = $user->member;

        //get all stories of user
        $allStories = $user->stories;

        //get authors of the user
        $authors = $user->authors;

        //stories to be loaded
        $more_stories_count = $allStories->count()-7;

        return view('home',compact(
            'user','member','allStories','authors','more_stories_count',
            'ctrlr'
        ));
    }
}
