<?php
use App\Models\Group;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\DocsController;
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
Route::get('/documents','Api\DocsController@index');
Route::post('/documents','Api\DocsController@store');
Route::delete('/documents/{id}','Api\DocsController@destroy');
Route::get('/documents/edit/{id}','Api\DocsController@edit');
Route::patch('/documents/edit/{id}','Api\DocsController@update');




// Route::apiResource('docs', DocsController::class);
// Route::domain('{school}.elearningapp.test')->group(function(){
// 	// route to get all groups
// 	Route::get('/groups','MainController@groups');
// 	// route to join groupe
// 	Route::Post('/joinGRP','MainController@joinGRP');
// 	// route to create post 
// 	Route::Post('/createPost','MainController@create_P');
// 	// route to update post 
// 	Route::update('/posts','MainController@update_P');
// 	// route to delete post 
// 	Route::delete('/posts','MainController@delete_P');
// 	// route to get posts in specific groupe
// 	Route::get('/posts/{id_group}','MainController@posts');
// 	// route to get post with author
// 	Route::get('/post_author/{id_post}','MainController@posts_author');

// });
