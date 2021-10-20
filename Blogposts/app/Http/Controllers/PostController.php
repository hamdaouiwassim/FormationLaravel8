<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$posts= Post::all();
        if ( Auth::user()->role != "client"){
           return redirect('/home');
        }
        return view('client.myposts');//->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('client.addpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);

        // start upload file
                    $file = $request->file('image');

                    //Move Uploaded File
                    $destinationPath = 'uploads';
                    $newName = uniqid().".".$file->getClientOriginalExtension();
                    $file->move($destinationPath,$newName);
        // Fin upload file

        $post = new Post();
        $post->title = $request->title;
        $post->image = $newName;
        $post->description = $request->description;
        $post->createur = Auth::user()->id;
        $post->category = $request->category;
        if ( $post->save() ) {
            return redirect('/client/posts');
        
        }else{
            return "erreur dans l'ajout";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function PostsList(){
        $posts = Post::where('stat',0)->get();
        return view('posts')->with('posts',$posts);
    }
    public function ShowPost($id){
        $post = Post::find($id);
        return view('post')->with('post',$post);

    }
    public function AddComment(Request $request){
        $comment = new Comment();
        $comment->createur_id  = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->save();
        return redirect()->back(); 

    }
}
