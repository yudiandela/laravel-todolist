<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Tampilkan index halaman awal
     *
     * @return void
     */
    public function index()
    {
        $todos = Todo::all();
        return view('single', compact('todos'));
    }

    /**
     * Masukkan data inputan ke database
     *
     * @param Request $request
     * @return void
     */
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

    /**
     * Tampilkan data yang akan di edit
     *
     * @param Todo $todo
     * @return void
     */
    public function show(Todo $todo)
    {
        $todos = Todo::all();
        return view('single', compact(['todos', 'todo']));
    }

    /**
     * Update data yang terpilih
     *
     * @param Request $request
     * @param Todo $todo
     * @return void
     */
    public function update(Request $request, Todo $todo)
    {
        $todo->update([
            'todo' => $request->todo,
            'slug' => str_slug($request->todo)
        ]);
        return redirect()->route('todo.index');
    }

    /**
     * Update dan check data dari checkbox
     *
     * @param Request $request
     * @param Todo $todo
     * @return void
     */
    public function check(Request $request, Todo $todo)
    {
        if ($todo->check == 'true') {
            $todo->update(['check' => 'false']);
        } else {
            $todo->update(['check' => 'true']);
        }

        return redirect()->route('todo.index');
    }

    /**
     * Hapus data
     *
     * @param Todo $todo
     * @return void
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todo.index');
    }
}
