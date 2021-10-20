<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class TestController extends Controller
{
    // cette fonction permet d'afficher la page html welcome
    public function index () {
        return view('welcome');
    }

     // cette fonction permet d'afficher la page html home
     public function home () {
        return view('home');
    }

     public function contact() {
         $numero = "+216 70 365 523";
         $adresse = "Monastir";
         return view('pages.contact')->with('num',$numero)->with('adr',$numero);
         //return view('pages.contact',compact('numero','adresse'));
    }


    public function somme($a) {
        echo $a+20;
    }



    // fonction qui permet d'ajouter une nouvelle publication
    public function ajouterPublication(){
        // Traitements
        $p = new Post(); 
        $p->title = "test post 1";
        $p->description = "description test post 1";
        $p->save(); // sauvgarder les donnes dans la base de donnes
        echo "publication ajoutee";
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


        $posts = Post::all(); // tableau de donnes
        return view('posts')->with('posts',$posts);

    }
}
