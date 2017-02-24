<?php

namespace App\Http\Controllers;

use App\Group;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreGroupsRequest;
use App\Http\Requests\UpdateGroupsRequest;

class GroupsController extends Controller
{

    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Gate::allows('user_access')) {
            return abort(401);
        }
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('user_create')) {
            return abort(401);
        }

        return view('groups.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreGroupsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupsRequest $request)
    {
        if (!Gate::allows('user_create')) {
            return abort(401);
        }
        $group = Group::create($request->all());

        return redirect()->route('groups.index');
    }

    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('user_edit')) {
            return abort(401);
        }
        $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select',
                ''),
        ];

        $group = Group::findOrFail($id);

        return view('groups.edit', compact('group'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupsRequest $request, $id)
    {
        if (!Gate::allows('user_edit')) {
            return abort(401);
        }
        $group = Group::findOrFail($id);
        $group->update($request->all());

        return redirect()->route('groups.index');
    }

    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('user_view')) {
            return abort(401);
        }

        $relations = [
            'news' => \App\News::where('group_id', $id)->get(),
        ];

        $group = Group::findOrFail($id);

        return view('groups.show', compact('group') + $relations);
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('user_delete')) {
            return abort(401);
        }
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('groups.index');
    }

    /**
     * Delete all selected Groups at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('user_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Group::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}