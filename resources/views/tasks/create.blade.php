@extends('layouts.main_layout')
@section('content')
    <hr>
    <h2 class="form-horizontal text-center">Publish a task:</h2>
    @include('layouts.errors')
    {!! Form::open(['url' => '/tasks', 'class' => 'form-horizontal', 'files' => true]) !!}
    @include ('tasks.form')
    {!! Form::close() !!}
@endsection
