<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoriesController extends Controller
{
    function index() {
    	return view('pending');
    }
}
