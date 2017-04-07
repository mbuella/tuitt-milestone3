<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Article;
use Session;

class ArticlesController extends Controller
{
    //This shows all articles
    function showArticles() {    	
		$articles = Article::all();
    	return view('article.articles',compact('articles'));
    }
    //This shows a particular article
    function showAnArticle($id) {
		$article = Article::find($id);
    	return view('article.article',compact('article'));
    }
    //This displays the add article form
    function addArticle() {
        return view('article.articles_new');
    }
    //This processes and saves POST new article data
    function saveNewArticle(Request $request) {
        //create new Article object
        $newArticle = new Article(
                $request->title,
                $request->content
            );
        //save new Article
        $newArticle->save();

        //set message here
        Session::flash('message','Article has been successfully added.');
        //redirect to articles
        return redirect('articles');
    }
    //This deletes the rquested article
    function deleteArticle($id) {
        //find the article and call delete
        $article = Article::find($id);
        $article->delete();

        //set message here
        Session::flash('message','Article has been successfully deleted.');

        //redirect to articles
        return redirect('articles');
    }
    //This updates the requested article
    function updateArticle($id,Request $request) {
        //find the article and call delete
        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        //set message here
        Session::flash('message','Article has been successfully updated.');

        //redirect to articles
        return redirect('articles');
    }
}
