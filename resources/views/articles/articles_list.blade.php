@extends('layouts.master')

@section('content')
    @if (isset($articles))
        @foreach($articles as $article)
        <article>
            <h2><a href='articles/{{ $article->id }}'>{{ $article->title }}</a></h2>
            <p>{{ $article->body }}</p>
        </article>
        @endforeach
    @endif
    
<div ng-app="appdirective" ng-controller="SomeController">
    <div>
        <input type="text" ng-model="color" placeholder="Enter a color" />
        <hello-world></hello-world>
    </div>
</div>
    
@endsection
