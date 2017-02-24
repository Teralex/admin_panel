<?php

namespace App\Http\Controllers\Api\V1;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NewsApiController extends \App\Http\Controllers\Controller
{

    public function index()
    {

        $articles = News::all();

        foreach ($articles as $article) {
            $json[$article->id] = [
                'title' => $article->title,
                'meta' => $article->description,
                'content' => $article->content,
                'date' => ($article->updated_at->format('M d Y h i s') >= $article->created_at->format('M d Y h i s') )
                    ? $article->updated_at->format('M d Y h i s') : $article->created_at->format('M d Y h i s')
            ];
        }
        return response()->json($json);
    }

    public function last()
    {

        $articles = News::orderBy('id', 'desc')->take(10)->get();

        foreach ($articles as $article) {
            $json[$article->id] = [
                'title' => $article->title,
                'meta' => $article->description,
                'content' => $article->content,
                'date' => ($article->updated_at->format('M d Y h i s') >= $article->created_at->format('M d Y h i s') )
                    ? $article->updated_at->format('M d Y h i s') : $article->created_at->format('M d Y h i s')
            ];
        }
        return response()->json($json);
    }
}