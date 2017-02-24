<?php

Route::group(['namespace' => 'Api\V1'], function()
{
    Route::get('/groups', 'GroupsApiController@index');
    Route::get('/{tagname}/articles', 'GroupsApiController@byGroup');
    Route::get('/articles', 'NewsApiController@index');
    Route::get('/articles/last', 'NewsApiController@last');
    Route::get('/templates', 'TemplatesApiController@index');
});