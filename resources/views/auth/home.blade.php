@extends('layouts.master')

@section('header')
@endsection


@section('content')
<h2>Home file</h2>
    @if(isset($users))
        @foreach ($users as $row)
            <p>{{ print_r($row) }}</p>
        @endforeach
    @endif
@endsection

@section('footer')
@endsection
