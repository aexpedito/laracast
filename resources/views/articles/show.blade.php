@extends('layouts.master')

@section('content')
    @if( isset($article))
    <article>
    <h1> {{ $article->title }} </h1>
        <p>{{ $article->body }}</p>
    </article>
    @endif
@endsection
