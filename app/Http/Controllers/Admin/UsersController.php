<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Task;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $users = User::where('name', 'LIKE', "%$keyword%")
                ->paginate(config('tasks.tasks_per_page'));
        } else {
            $users = User::orderBy('id', 'asc')
                ->paginate(config('tasks.tasks_per_page'));
        }
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $tasks = Task::where('user_id', $id)->get();
        return view('admin.users.show', compact('user', 'tasks'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->validate(request(),[
            'name' => 'required|min:2',
            'email'=>'required|email',
            'is_admin'=>'required|boolean',
        ]);
        $user->update(request(['name', 'email', 'is_admin']));
        return redirect('admin/users');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('admin/users');
    }
}
