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

Route::get('/', 'PagesController@home');

Auth::routes();

// autenticacion con facebook
Route::get('auth/facebook','SocialAuthController@facebook');

Route::get('auth/facebook/callback','SocialAuthController@callback');

Route::post('auth/facebook/register', 'SocialAuthController@register');
// autenticacion con facebook

Route::get('/home', 'HomeController@index');

Route::get('/messages', 'MessagesController@search');


Route::group(['middleware' => 'auth'], function(){
  Route::post('/messages/create', 'MessagesController@create');
  Route::post('/{username}/dms', 'UsersController@sendPrivateMessage');
  Route::post('/{username}/follow', 'UsersController@follow');
  Route::post('/{username}/unfollow', 'UsersController@unfollow');

  Route::get('/api/notifications','UsersController@notifications');

  Route::get('/conversations/{conversation}','UsersController@showConversation');
});

Route::get('/messages/{message}', 'MessagesController@show');

Route::get('/{username}', 'UsersController@show');

Route::get('/{username}/follows', 'UsersController@follows');

Route::get('/{username}/followers', 'UsersController@followers');

Route::get('/api/messages/{message}/responses', "MessagesController@responses");
