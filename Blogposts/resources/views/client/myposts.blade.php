@extends('layouts.dashClient')

@section('content')
    <div class="container mt-5 p-5">
        <div class="row justify-content-center">
            <div class="col-12  mt-5 p-5">

                <h3>My posts </h3>
                <hr />
                <a class="btn btn-primary" href="{{ route('addPost') }}">Add Post</a>
                <hr />

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Post Title</td>
                            <td>Post Image</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( Auth::user()->posts as $post)
                        <tr>
                            <td> {{ $post->title }}</td>
                            <td> <img src="{{ asset('uploads') }}/{{ $post->image }}" style="width:100px" /> </td>
                            <td>
                                <a href="" class="btn btn-primary"> <i class="fas fa-eye"></i> </a>
                                <a href="" class="btn btn-success"> <i class="fas fa-edit"></i> </a>
                                <a href="" class="btn btn-danger"> <i class="fas fa-trash"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>
        </div>
    </div>
@endsection
