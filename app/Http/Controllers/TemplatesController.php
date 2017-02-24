<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplatesRequest;
use App\Http\Requests\UpdateTemplatesRequest;
use App\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class TemplatesController extends Controller
{
    /**
     * Display a listing of Template.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (! Gate::allows('template_access')) {
            return abort(401);
        }
        $templates = Template::all();

        return view('templates.index', compact('templates'));
    }

    /**
     * Show the form for creating new Template.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('template_create')) {
            return abort(401);
        }

        return view('templates.create', []); // $relations
    }

    /**
     * Store a newly created Template in storage.
     *
     * @param  \App\Http\Requests\StoreTemplatesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTemplatesRequest $request)
    {
        if (! Gate::allows('template_create')) {
            return abort(401);
        }

        $requestData = $request->all();
        $what   = "\\x00-\\x20";
        $requestData['content'] = trim( preg_replace( "/[".$what."]+|\r\n/" , ' ' , $requestData['content'] ) , $what );

        Template::create($requestData);

        return redirect()->route('templates.index');
    }


    /**
     * Show the form for editing Template.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('template_edit')) {
            return abort(401);
        }

        $templates = Template::findOrFail($id);

        return view('templates.edit', compact('templates'));
    }

    /**
     * Update Template in storage.
     *
     * @param  \App\Http\Requests\UpdateTemplatesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTemplatesRequest $request, $id)
    {
        if (! Gate::allows('template_edit')) {
            return abort(401);
        }
        $template = Template::findOrFail($id);

        $requestData = $request->all();
        $what   = "\\x00-\\x20";
        $requestData['content'] = trim( preg_replace( "/[".$what."]+|\r\n/" , ' ' , $requestData['content'] ) , $what );
        $template->update($requestData);

        return redirect()->route('templates.index');
    }


    /**
     * Display Template.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('template_view')) {
            return abort(401);
        }

        $template = Template::findOrFail($id);

        return view('templates.show', compact('template'));
    }


    /**
     * Remove Template from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('template_delete')) {
            return abort(401);
        }
        $template = Template::findOrFail($id);
        $template->delete();

        return redirect()->route('templates.index');
    }

    /**
     * Delete all selected Templates at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('template_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Template::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
