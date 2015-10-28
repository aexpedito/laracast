@extends('layouts.master')

@section('content')
<h2>Article create</h2>

{!! Form::open(['url' => 'articles/create']) !!}
<div class='form-group'>
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('body', 'Body') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('published_at', 'Publish on') !!}
    {!! Form::input('date', 'published_at', Carbon\Carbon::now()->format('d/m/Y'), ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}

@endsection
