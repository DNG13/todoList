@extends('layouts.main_layout')
@section('content')
    <div class="content">
        <div class="container">
            <div class="content-grids">
                <div class="col-md-8 content-main">
                    <div class="content-grid">
                        <h1>What is to be done?
                            <div class="btn-group">
                                <a href="/tasks/create" title="Add New Task" class="btn btn-primary btn-sm">
                                    <i aria-hidden="true" class="fa fa-plus "></i> Add Task
                                </a>
                                <a href="/tasks" title="Old Tasks" class="btn btn-primary btn-sm">
                                    <i aria-hidden="true" class="fa fa-tasks"></i> Future task
                                </a>
                            </div>
                        </h1>
                        @forelse ($tasks as $key=>$item)
                            <h3>{{$key}}</h3>
                        @foreach($item as $task)
                            <div class="content-grid-info col-lg-8 col-lg-offset-4">
                                <h4>Date: {{  date(" D, j M Y  H:i", strtotime($task->date)) }}
                                    <div class="btn-group">
                                        <a href="{{ url('/tasks/' . $task->id . '/edit') }}"
                                           data-toggle='tooltip' title='Edit' class="btn btn-primary">
                                            <i class='glyphicon glyphicon-pencil'></i>
                                        </a>
                                        <form action="/tasks/{{$task->id}}" method="post" style="display: inline-block;">
                                            {{csrf_field()}}
                                            {!! method_field('delete')!!}
                                            <button class="btn btn-danger" type="submit" data-toggle='tooltip' title='Delete'>
                                                <i class='glyphicon glyphicon-trash' aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                </h4>
                                <h4>Title: {{$task->title}}</h4>
                                <h4>Description: {{$task->description}}</h4>
                            </div>
                            @endforeach
                        @empty
                            <div class="content-grid">
                                <p>You don`t have any tasks.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection