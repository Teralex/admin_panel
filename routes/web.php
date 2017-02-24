<?php


// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}',
    'Auth\ResetPasswordController@showResetForm')->name('auth.password.email');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


Route::group(['middleware' => 'auth'],
    function () {
    Route::get('/', 'HomeController@index');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy',
        ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);

    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy',
        ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);

    Route::resource('templates', 'TemplatesController');
    Route::post('templates_mass_destroy',
        ['uses' => 'TemplatesController@massDestroy', 'as' => 'templates.mass_destroy']);

    Route::resource('groups', 'GroupsController');
    Route::post('groups_mass_destroy',
        ['uses' => 'GroupsController@massDestroy', 'as' => 'groups.mass_destroy']);

    Route::resource('news', 'NewsController');

    Route::post('templates_mass_destroy',
        ['uses' => 'TemplatesController@massDestroy', 'as' => 'templates.mass_destroy']);

    Route::get('/upload', 'UploadController@index');
    Route::post('/upload/image', 'UploadController@image');
});
