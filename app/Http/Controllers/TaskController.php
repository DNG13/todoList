<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('date', '>', Carbon::now())
            ->where('user_id', Auth::user()->id)
            ->orderBy('date', 'desc')
            ->select('id', 'title', 'date', 'description')
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->date)->format('D, j M Y');
            });
        return view('tasks.index', compact('tasks'));
    }

    public function show(){
        $tasks =  Task::where('date', '<=', Carbon::now())
            ->where('user_id', Auth::user()->id)
            ->orderBy('date', 'desc')
            ->select('id', 'title', 'date', 'description')
                ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->date)->format('D, j M Y');
            });
        return view('tasks.archive', compact('tasks'));
    }

    public function create(){
        return view('tasks.create');
    }

    public function store(Request $request){
        $this->validate(request(),[
            'title' => 'required|min:2',
            'description'=>'required|min:2',
            'date'=>'required',
        ]);
        $task = new Task();
        $task->title = $request->get('title');
        $task->description = $request->get('description');
        $task->date = $request->get('date');
        $task->user_id = Auth::user()->id;
        $task->save();
        return redirect('tasks');
    }

    public function edit(Task $task){
        return view('tasks.edit', compact('task'));
    }

    public function update(Task $task){
        $this->validate(request(),[
            'title' => 'required|min:2',
            'description'=>'required|min:2',
            'date'=>'required',
        ]);
        $task->update(request(['title', 'description', 'date']));
        return redirect('tasks');
    }

    public function destroy(Task $task){
        $task->delete();
        return redirect('tasks');
    }
}
