@extends('layouts.app')

@section('content')


<div class="conatiner p-5">
    <h3>Liste des publications : <span class="badge bg-danger">( {{ count($posts) }} )</span> </h3>
    <div class="row ">
            <div class="col-6">
                <form action="{{  route('searchPost') }}" class="d-flex" method="post">
                    @csrf
                    <input name="keywords" type="text" class="form-control">
                    <select name="filter_date" id="">
                        date : 
                        <option value="ASC">Asc</option>
                        <option value="DESC">Desc</option>
                    </select>
                    <input type="submit" value="Chercher" class="btn btn-primary">
                </form>
            </div>
            <div class="col-6 d-flex justify-content-end p-4">
                <a href="{{ route('PostForm') }}" class="btn btn-secondary">Ajouter</a>
            </div>
    </div>
   
        
                                           

    @foreach( $posts as $index => $post  )
            <div class="card mb-3">
                <div class="card-header">
                   publication numero {{ $index+1 }}  : {{ $post->title }} 

                   <a href="/post/show/{{ $post->id }}" class="btn btn-success">Afficher</a>
                   <a href="/post/edit/{{ $post->id }}" class="btn btn-secondary">Modifier</a>
                   <a onclick="return confirm('Voulez-vous vraiment supprimer cette publication?') " href="/post/delete/{{ $post->id }}" class="btn btn-danger">Supprimer</a>
                </div>
                <div class="alert alert-success text-center">
                    {{ $post->categorie->name }}
                </div>

                <div class="card-body">
                    {{ $post->description }}
                </div>

                <div class="card-footer">
                   creer par : <span class="text-success">{{ $post->user->name }} </span>le : <span class="badge bg-primary">{{ $post->created_at }}</span> 
                </div>
            
            </div>
    @endforeach

  


</div>


@endsection