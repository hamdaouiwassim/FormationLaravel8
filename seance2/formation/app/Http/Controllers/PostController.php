<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function postShow($id){

        $p = Post::find($id);
        if($p){
            return view('post')->with('p',$p);

        }else{
            echo "404 Not Found";
        }
        
    }
}
