<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    function index() {
    	return view('pending');
    }
}
