<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Conference;
use App\Http\Resources\PostResource as PostResource;
class PostsController extends Controller
{
    use ApiResponseTrait; //must put here not above in use 
 
 
    public function index(){
        //pagination 
        // $posts= PostResource::collection(Conference::limit(4)->offset(2)->get());
        //or
        // $posts= PostResource::collection(Conference::paginate(4));
        //all()
         $posts= PostResource::collection(Conference::get()); //in return list
    return $this->apiResponse($posts);
    }


    public function show($id){
      
        $post=Conference::find($id);  //in return one object
      
        if($post)
        {
            $post= new PostResource( $post);
            return $this->apiResponse($post);
        }
        return $this->apiResponse(null,'Id Not Found','404');     // status errorr

    }

    public function storeData(Request $request){
        $post= Conference::create($request->all());


        if($post)
        {
            $post= new PostResource( $post);
            return $this->apiResponse($post,null ,'201'); //201 created success
        }
        return $this->apiResponse(null,'Unknown error','400');     // status errorr

    }
}
