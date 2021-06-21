<?php
use App\Models\Group;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::domain('{school}.elearningapp.test')->group(function(){
	Route::get('/groups','MainController@groups');
	Route::Post('/joinGRP','MainController@joinGRP');
	Route::Post('/createPost','MainController@create_P');
	Route::update('/posts','MainController@update_P');
	Route::delete('/posts','MainController@delete_P');
	Route::get('/posts/{id_group}','MainController@posts');
	Route::get('/post_author/{id_post}','MainController@posts_author');

});
