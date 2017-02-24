<?php

namespace App\Http\Controllers;

use App\News;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Requests\StoreNewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of News.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('news_access')) {
            return abort(401);
        }
        $news = News::all();

        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating new News.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('news_create')) {
            return abort(401);
        }

        $groups = [];
        foreach (Group::all()->toArray() as $group){
            $groups[$group['id']] = $group['title'];
        }
        return view('news.create', ['groups' => $groups]);
    }

    /**
     * Store a newly created News in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        if (! Gate::allows('news_create')) {
            return abort(401);
        }

        News::create($request->all());

        return redirect()->route('news.index');
    }


    /**
     * Show the form for editing News.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('news_edit')) {
            return abort(401);
        }

        $news = News::findOrFail($id);

        $groups = [];
        foreach (Group::all()->toArray() as $group){
            $groups[$group['id']] = $group['title'];
        }

        return view('news.edit', compact('news') + compact('groups'));
    }

    /**
     * Update News in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, $id)
    {
        if (! Gate::allows('news_edit')) {
            return abort(401);
        }
        $user = News::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('news.index');
    }


    /**
     * Display News.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('news_view')) {
            return abort(401);
        }

        $news = News::findOrFail($id);
        $group = Group::findOrFail($news->group_id);
        $news->group = $group->title;

        return view('news.show', compact('news'));
    }


    /**
     * Remove News from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('news_delete')) {
            return abort(401);
        }
        $user = News::findOrFail($id);
        $user->delete();

        return redirect()->route('news.index');
    }

    /**
     * Delete all selected News at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('news_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = News::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
