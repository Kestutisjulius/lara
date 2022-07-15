<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request as Request;

class ToDoController extends Controller
{

    public function index(Request $request)
    {

        $todos = match ($request->sort)
        {
            'asc' => ToDo::orderBy('title', 'asc')->get(),
            'desc' => ToDo::orderBy('title', 'desc')->get(),

            default => ToDo::orderBy('todo', 'asc')->get()
        };
        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $todo = new ToDo;
        $todo->title = $request->todo_title;
        $todo->text = $request->todo_text;
        $todo->save();
        return redirect()->route('todos_index')->with('success', "TODO faster! created");
    }

    public function show(int $todo_id)
    {
        $todo = ToDo::where('id', $todo_id)->first();
        return view('todo.show', ['todo'=>$todo]);
    }

    public function edit(ToDo $toDo)
    {
        //
    }

    public function update(Request $request, ToDo $toDo)
    {
        //
    }
    public function todo(Request $request, ToDo $todo)
    {

        $todo->todo = $request->todo;
        $todo->save();
        return redirect()->route('todos_index');
    }


    public function destroy(ToDo $toDo)
    {
        //
    }
}
