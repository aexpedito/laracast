@extends('layouts.master')

@section('content')
<h2>Article create</h2>

{!! Form::open(['url' => 'articles']) !!}
    @include('articles._form', ['submitButtonText'=>'Add Article'])
{!! Form::close() !!}

@include('errors.list')

@endsection
