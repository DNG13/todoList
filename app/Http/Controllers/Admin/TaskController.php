<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use App\User;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $users = User::pluck('name', 'id');
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $tasks = Task::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate(config('tasks.tasks_per_page'));
        } else {
            $tasks = Task::orderBy('date', 'desc')
                ->paginate(config('tasks.tasks_per_page'));
        }
        foreach($tasks as &$task){
            foreach($users as $id =>$user)
            if($task->user_id == $id){
                $task->user_id = $user;
            }
        }
        return view('admin.tasks.index', compact('tasks', 'users'));
    }


    public function show(Task $task)
    {
        return view('admin.tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('admin.tasks.edit', compact('task'));
    }

    public function update(Task $task)
    {
        $this->validate(request(),[
            'title' => 'required|min:2',
            'description'=>'required|min:2',
            'date'=>'required',
        ]);
        $task->update(request(['title', 'description', 'date']));
        return redirect('admin/tasks');
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return redirect('admin/tasks');
    }
}
