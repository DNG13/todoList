@extends('layouts.main_layout')
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Task</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/tasks') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />
                        @include('layouts.errors')
                        {!! Form::open(['url' => '/admin/tasks', 'class' => 'form-horizontal', 'files' => true]) !!}
                        @include ('admin.tasks.form')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
