@extends('layouts.main_layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body  text-center">
                    <h2>You are logged in!</h2>
                    <h3>To write own todo list go <a href="/tasks" class="btn btn-primary"><strong>here</strong>.</a></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
