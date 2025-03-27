@extends('layouts.app')
   

@section('title', 'Home')

@section('content')
    <div class="load-posts">
        <div class="posts">
        @foreach ($posts as $post)
                <li href="{{ route('post.show', $post->id) }}">
                    <div id="post">
                        <a href="{{ route('post.show', $post->id) }}">
                            <strong>{{ $post ->title}}</strong></a><br>
                            <em>{{ \Illuminate\Support\Str::limit($post->body, 100, '...') }}</em>
                    </div>
                    <br>  
                    <em>{{ $post->created_at->format('d-m-Y') }}</em>
                </li>
            @endforeach 
        </div>
    </div>
    
    <div class="load-posts">
        <div class="posts">
        @foreach ($posts as $post)
                <li href="{{ route('post.show', $post->id) }}">
                    <div id="post">
                        <a href="{{ route('post.show', $post->id) }}">
                            <strong>{{ $post ->title}}</strong></a><br>
                            <em>{{ \Illuminate\Support\Str::limit($post->body, 100, '...') }}</em>
                    </div>
                    <br>  
                    <em>{{ $post->created_at->format('d-m-Y') }}</em>
                </li>
            @endforeach 
        </div>
    </div>
    
@endsection

    
