@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Posts</h2>
            </div>
            <div class="col-12 text-right">
                <a class="btn btn-outline-success" href="{{ route('posts.create') }}">Create Post</a>
            </div>
            <div class="col-12">
                @forelse ($posts as $item)
                    {{ $item->title }} | <a href="{{ route('posts.edit', $item->id) }}">Editar</a>
                    <hr>
                @empty
                    <p>Post not found</p>
                @endforelse
            </div>
        </div>
    </div>

@endsection
