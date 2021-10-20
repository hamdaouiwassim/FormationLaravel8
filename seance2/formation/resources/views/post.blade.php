@extends('layouts.app')

@section('content')


<div class="conatiner p-5">
    <h3>Publication :  </h3>
    <div>
        Title : {{ $p->title }} 
    </div>
    <div>
        Description : {{ $p->description }} 
    </div>
    <div>
        creer le  : {{ $p->created_at }} 
    </div>

</div>


@endsection