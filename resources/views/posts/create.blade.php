@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Create Post</h2>
            </div>
            <div class="col-12 text-right">
                <a class="btn btn-outline-success" href="{{ route('posts.index') }}">List Post</a>
            </div>

            <div class="col-9 mx-auto">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input class="form-control" type="text" name="title" placeholder="title">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="body" placeholder="content" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success">save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
