@extends('layouts.dashClient')

@section('content')
<div class="container mt-5 p-5">
    <div class="row justify-content-center">
        <div class="col-12 mt-5 p-5">
                    <h3>Add Post </h3> 
                    <hr />
                    <form action="{{ route('addPostDb') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                     
                            <input type="text" name="title" class="form-control" placeholder="post title ...">
                            <br />
                  
                            <input type="file" name="image" class="form-control">
                            <br />
                       
                    
                            <textarea name="description" class="form-control" cols="10" placeholder="post description ..." ></textarea>
                            <br />

                            
                         

                            <input type="text" name="category" class="form-control" placeholder="post category ...">
                            <br />
                            <button type="submit" class="btn btn-primary"> Add</button>
                        
                       
                        

                    </form>
              
            
        </div>
    </div>
</div>
@endsection