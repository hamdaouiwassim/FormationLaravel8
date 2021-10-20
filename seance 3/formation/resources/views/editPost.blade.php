@extends('layouts.app')

@section('content')


<div class="conatiner p-5">
    <h3>Page Modifier Publication <span class="text-primary"> "{{ $post->title }}" </span> </h3>

    <form method="POST" action="{{ route('PostUpdate') }}" >
        @csrf
        <div class="mb-3">
          <label  class="form-label">Titre publication</label>
          <input type="text" name="titre" class="form-control" value="{{ $post->title }}" >
         
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Description publication</label>
          <textarea name="description" class="form-control" cols="30" rows="10"> {{ $post->description }} </textarea>
        </div>
        <input type="hidden" name="id_post" value="{{ $post->id }}">
        <button type="submit" class="btn btn-primary">Modifier</button>
      </form>



</div>


@endsection