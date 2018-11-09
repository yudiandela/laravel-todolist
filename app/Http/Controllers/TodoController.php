<?php

namespace File Upload Vue\Http\Controllers;

use File Upload Vue\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('welcome', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'required|unique:todos'
        ]);

        $todo = new Todo();
        $todo->todo = $request->todo;
        $todo->slug = str_slug($request->todo);
        $todo->save();

        return redirect()->route('todo.index');
    }

    public function show(Todo $todo)
    {
        $todos = Todo::all();
        return view('single', compact(['todos', 'todo']));
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update([
            'todo' => $request->todo,
            'slug' => str_slug($request->todo)
        ]);
        return redirect()->route('todo.index');
    }

    public function check(Request $request, Todo $todo)
    {
        if ($todo->check == 'true') {
            $todo->update(['check' => 'false']);
        } else {
            $todo->update(['check' => 'true']);
        }

        return redirect()->route('todo.index');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todo.index');
    }
}
