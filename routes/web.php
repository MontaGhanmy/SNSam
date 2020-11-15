<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('connexion', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('connexion', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::get('register/verify/{token}', [
    'as' => 'verify',
    'uses' => 'Auth\RegisterController@verify'
]);
Route::get('deconnexion', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('pass/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('pass/reinit', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('pass/reinit', [
    'as' => '',
    'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('pass/reinit/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);
Route::group(
    ['middleware' => 'App\Http\Middleware\RedirectIfAuthenticated'],
    function () {
        Route::get('inscription', [
            'as' => 'register',
            'uses' => 'Auth\RegisterController@showRegistrationForm'
        ]);

        Route::post('inscription', [
            'as' => '',
            'uses' => 'Auth\RegisterController@register'
        ]);
    }
);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/webinar', 'PageController@getWebinar');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/contact', 'HomeController@contact');
    Route::get('/recherche/{slug}', 'PostController@invokeSearch');
    Route::get('/page/{slug}', 'PageController@invoke');
    Route::get('/post/{slug}', 'PostController@invoke');
    Route::get('/video/{slug}', 'PostController@invokeVideo');
    Route::get('/article/{type}', 'PostController@getArticles');
    Route::get('/club-douleur', 'PostController@getClub');
    Route::get('/videos/{type}', 'PostController@getVideos');
    Route::post('/message', 'PostController@setMessage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
