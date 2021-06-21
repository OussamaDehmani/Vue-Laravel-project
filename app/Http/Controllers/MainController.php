<?php

namespace App\Http\Controllers;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\Post;

use Illuminate\Http\Request;

class MainController extends Controller
{
    private $school;

    // **************************** on initialise le constructeur avec le nom de l'école passé par le subdomain
    public function __construct(Request $request){
    	$this->school=$request->school;
    }


    //************************* fonction pour lister les groupes de cette école
    public function groups(){
    	$school=School::where('slug','=',$this->school)->first();
    	$groups=Group::where('school_id','=',$school)->get();
    	return response($groups,200);
    }


	//************************* fonction pour joindre un groupe ****************************
      public function joinGRP(Request $request){
      	$id_group=$request->id_group;
      	$id_user=$request->id_user;

      	//get all users of this groupe
      	$users_of_grp= DB::table('group_user')->select('user_id')->get();

      	//checking if the user is a member so we return an error otherwise add him to the group
      	$temoin=true;
      	foreach($users_of_grp as $user){
      		// if the user is already a member of the group
      		if($user==$id_user){
      			$temoin=false;
      			return response('error', 404);
      		}
      	}
      	if($temoin){
      		DB::table('users')->insert(
    			['group_id' => $id_group, 'user_id' => $id_user]
			);
			return response('success', 200);
      	}
      	
    	
    }
    	//**************************** function to create post 

     public function create_P(Request $request,){
     	$temoin=false;
     	$bad_w=['bad1','bad2','bad3']
     	$str_arr = explode (",", $request->content); 
     	foreach($str_arr as $txt){
     		foreach($bad_w as $bad){
     			if($bad==txt){

     				return response('your code contain bad word',404);
     			}
     		}
     	}
     	$post=new Post();
     	$pots->user_id=$request->content;
     	$pots->user_id=$request->group_id;
     	$pots->user_id=$request->user_id;
     	 $post->save();
     	return response('post created', 200);

     }

         	//**************************** function to update post 

     public function update_P(Request $request){

     	//check if the author is same as the one who wanna update the post
     	$post=Post::find($request->post_id);
     	$user=$post->user()->id;
     	if($user==$request->user_id){
     	$post->content=$request->content;
     	return $post->save();
     	}
     }  
            //**************************** function to update post 

     public function delete_P(Request $request){

     	//check if the author is same as the one who wanna update the post
     	$post=Post::find($request->post_id);
     	$user=$post->user()->id;
     	if($user==$request->user_id){
     	$post->delete();
     	}
     }

    	//**************************** function to get post whit it's his creator 
      public function post_author(Request $request, $id_post){

	    
		$post= Post::where('post_id','=',$id)->get();
		$author=$post->user()->name;
		return response([$posts,$author], 200);

    }

    	// **************************** function to get all group posts
      public function posts(Request $request, $id_group){

		$posts= Post::where('group_id','=',$id_group)->get();
		return response($posts, 200);
    }
}
