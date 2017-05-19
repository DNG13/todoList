@extends('layouts.main_layout')
@section('content')
    <hr>
    <h2 class="form-horizontal text-center">Edit a task:</h2>
    @include('layouts.errors')
    {!! Form::model($task, [
                            'method' => 'PATCH',
                            'url' => ['/tasks', $task->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}
    @include ('tasks.form', ['submitButtonText' => 'Update'])
    {!! Form::close() !!}
@endsection