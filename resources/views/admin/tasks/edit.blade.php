@extends('layouts.main_layout')
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Task: <strong>{{ $task->id }}</strong></div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/tasks') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />
                        @include('layouts.errors')
                        {!! Form::model($task, [
                            'method' => 'PATCH',
                            'url' => ['/admin/tasks', $task->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}
                        @include ('admin.tasks.form', ['submitButtonText' => 'Update'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
