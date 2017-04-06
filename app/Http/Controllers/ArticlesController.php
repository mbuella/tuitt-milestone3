<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //This shows all articles
    function showArticles() {    	
		$articles = \App\Article::all();
    	return view('article.articles',compact('articles'));
    }
    //This shows a particular article
    function showAnArticle($id) {
		$article = \App\Article::find($id);
    	return view('article.article',compact('article'));
    }
}
