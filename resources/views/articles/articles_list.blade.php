@extends('layouts.master')

@section('content')
    @if (isset($articles))
        {{ print($articles) }}
    @endif
@endsection
