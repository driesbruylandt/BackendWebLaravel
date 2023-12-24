@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Alle Posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $post)
                        <div class="card">
                            <div class="card-header">
                                {{ $post->title }}
                            </div>
                            <div class="card-body">
                                {{ $post->message }}
                                <br>
                                <small>geschreven door {{ $post->user->name }} op {{$post->created_at->format('d/m/y \o\m H:i')}}</small>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
