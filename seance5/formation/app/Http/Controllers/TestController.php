<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

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



}
