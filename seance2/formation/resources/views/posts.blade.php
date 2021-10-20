@extends('layouts.app')

@section('content')


<div class="conatiner p-5">
    <h3>Liste des publications : <span class="badge bg-danger">( {{ count($posts) }} )</span> </h3>
    @foreach( $posts as $index => $post  )
            <div class="card mb-3">
                <div class="card-header">
                   publication numero {{ $index+1 }}  : {{ $post->title }} 

                   <a href="/post/show/{{ $post->id }}" class="btn btn-success">Afficher</a>
                </div>
                <div class="card-body">
                    {{ $post->description }}
                </div>

                <div class="card-footer">
                   creer le : <span class="badge bg-primary">{{ $post->created_at }}</span> 
                </div>
            
            </div>
    @endforeach
</div>


@endsection