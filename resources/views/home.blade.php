@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">API documentation</div>

            <div class="panel-body">
                <p>Get all Groups: <a href="{{Request::root()}}/api/groups"> {{Request::getHost()}}/api/groups </a> </p>
                <p>Get all Articles: <a href="{{Request::root()}}/api/articles"> {{Request::getHost()}}/api/articles </a></p>
                <p>Get all Articles by Group: <a href="{{Request::root()}}/api/news/articles"> {{Request::getHost()}}/api/{tagname}/articles  </a></p>
                <p>Get last 10 articles: <a href="{{Request::root()}}/api/articles/last"> {{Request::getHost()}}/api/articles/last  </a></p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Home page</div>

            <div class="panel-body">
                Documentation
            </div>
        </div>
    </div>
</div>

@endsection
