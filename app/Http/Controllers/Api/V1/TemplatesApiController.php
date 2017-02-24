<?php

namespace App\Http\Controllers\Api\V1;

use App\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TemplatesApiController extends \App\Http\Controllers\Controller
{

    public function index()
    {

        $templates = Template::all();

        $json = [];

        foreach ($templates as $template) {
            $json[] = [
                'title' => $template->title,
                'html' => $template->content
            ];
        }
        return json_encode($json);
        //return response()->json($json);
    }
}