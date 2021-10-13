@extends('layouts.app')

@section('content')

<div class="container">
                <div class="text-center">
                    <h2 class="text-center">Affichage du categorie :<span class="badge bg-primary text-white">{{ $categorie->name }}</span>  </h2>
                    <p >
                        {{ $categorie->description }}
                    </p>
            </div>
            <div>
                <h2>les publications de cette categorie : </h2>
                @foreach($categorie->posts as $post)

                        <div class="card mb-2 p-4">
                            <h3>Ecrivan : {{ $post->user->name }} </h3>
                            <h5>{{ $post->title }}</h5>
                            <p>{{ $post->description }}</p>
                        </div>

                @endforeach
                
            </div>
</div>

     
@endsection