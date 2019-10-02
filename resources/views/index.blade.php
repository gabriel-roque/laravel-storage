@extends('template.layout')

@section('content')

    <div class="container mt-3 text-center">
        <a href="{{route('posts.create')}}"><button class="btn badge-primary">Criar</button></a>
    </div>

    <div class="container">

        <div class="container mt-3">
            <div class="row justify-content-md-center">
                @foreach($posts as $post)
                    <div class="card m-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->name}}</h5>
                            <a href="{{route('post.download', $post->id)}}" class="btn btn-success">Download</a>
                            <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
