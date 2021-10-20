<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class PostController extends Controller
{
    //

    
    // fonction qui permet d'ajouter une nouvelle publication
    public function ajouterPublication(Request $request){

        // echo $request->titre;
        // echo $request->description;

        //dd($request);
        // Traitements
        $p = new Post(); 
        $p->title =$request->titre;
        $p->description = $request->description;
        $p->save(); // sauvgarder les donnes dans la base de donnes
        //echo "publication ajoutee";
        Toastr::error('publication Ajoutee', 'Publication', ["positionClass" => "toast-bottom-right"]);
        return redirect('/posts/all');
    } 
    // public function ajouterPublication($title,$description){
    //     // Traitements
    //     $p = new Post(); 
    //     $p->title = $title;
    //     $p->description = $description;
    //     $p->save(); // sauvgarder les donnes dans la base de donnes
    //     echo "publication ajoutee";
    // } 

    public function postsAfficherTout(){


        $posts = Post::all();
        //dd($posts);
         // tableau de donnes
        return view('posts')->with('posts',$posts);

    }

    
    public function postShow($id){

        $p = Post::find($id);
        if($p){
            return view('post')->with('p',$p);

        }else{
            echo "404 Not Found";
        }
        
    }
    public function AjoutForm(){
        return view('formAjouter');
    }

    public function deletePost($id){

        $p = Post::find($id);
        $p->delete();
        Toastr::success('publication supprimee', 'Publication', ["positionClass" => "toast-bottom-right"]);
        return redirect('/posts/all'); 

    }

    public function editPost($id){

        $p = Post::find($id);
        return view('editPost')->with('post',$p);

    }

    public function updatePost(Request $request){
        
        //dd($request);
        $p = Post::find($request->id_post);
        $p->title = $request->titre;
        $p->description = $request->description;
        $p->update();
        Toastr::success('publication modifiee', 'Publication', ["positionClass" => "toast-bottom-right"]);
        return redirect('/posts/all'); 

        

    }

    public function searchPost(Request $request){
        // definition 
        // echo($request->keywords);
        $filterDate = $request->filter_date;
        $posts = Post::where('title','LIKE','%'.$request->keywords.'%')
                            ->Orwhere('description','LIKE','%'.$request->keywords.'%')
                            ->orderBy('created_at', $filterDate)
                            ->get();
                           

        return view('posts')->with('posts',$posts);
    }

  
}
