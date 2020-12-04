@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Edit Post</h2>
            </div>
            <div class="col-12 text-right">
                <a class="btn btn-outline-success" href="{{ route('posts.index') }}">List Post</a>
            </div>

            <div class="col-9 mx-auto">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @elseif ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                @endif

                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" value="{{ $post->title }}" placeholder="title">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="body" placeholder="content" cols="30" rows="5">{{ $post->body }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success">save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
