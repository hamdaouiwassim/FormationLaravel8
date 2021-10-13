@extends('layouts.app')

@section('content')


<div class="conatiner p-5">


    <h3 class="text-center">Page Contact</h3>


    <h4>
        Numero Telephone : 
       {{ $num }}
    </h4>
       <hr />
       <code>
           Adresse :
        {{ $adr }}   
    </code>
       

    
</div>


@endsection