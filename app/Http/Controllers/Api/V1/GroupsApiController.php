<?php

namespace App\Http\Controllers\Api\V1;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GroupsApiController extends \App\Http\Controllers\Controller
{

    public function index()
    {

        $groups = Group::all();

        echo '<PRE>';
        foreach ($groups as $group) {
            $json[$group->id] = [
                'title' => $group->title,
                'tagname' => $group->tagname,
                'date' => ($group->updated_at->format('M d Y h i s') >= $group->created_at->format('M d Y h i s') )
                    ? $group->updated_at->format('M d Y h i s') : $group->created_at->format('M d Y h i s')
            ];
        }

        //return json_encode($json);
        return response()->json($json);
    }

    public function byGroup($tagname)
    {
        $group    = Group::where('tagname', $tagname)->first();
        $articles = \App\News::where('group_id', $group->id)->get();
        $json     = [];
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