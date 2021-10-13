@extends('layouts.app')

@section('content')


<div class="conatiner p-5">
    <h3>Page Ajouter Publication</h3>

    <form method="POST" action="{{ route('AddPost') }}" >
        @csrf
        <div class="mb-3">
          <label  class="form-label">Titre publication</label>
          <input type="text" name="titre" class="form-control"  >
         
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Description publication</label>
          <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Categorie publication</label>
         <select name="category_id" class="form-control">
              @foreach($categories as $categorie)
                  <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
              @endforeach
         </select>
        </div>
       
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>



</div>


@endsection