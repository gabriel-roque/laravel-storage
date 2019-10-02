@extends('template.layout')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name: </label>
                        <input type="text"
                               class="form-control"
                               id="name"
                               placeholder="Enter a name"
                               name="name"
                        >
                    </div>
                    <div class="form-group">
                        <label for="file">File input</label>
                        <input type="file"
                               class="form-control-file"
                               id="file"
                               name="file_image"
                        >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
