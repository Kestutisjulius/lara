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

            default => ToDo::all()
        };
        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(ToDo $toDo)
    {
        //
    }

    public function edit(ToDo $toDo)
    {
        //
    }

    public function update(Request $request, ToDo $toDo)
    {
        //
    }

    public function destroy(ToDo $toDo)
    {
        //
    }
}
