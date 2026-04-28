<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::latest()->get();

        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required'
        ]);

        Todo::create(
            $request->only([
                'title',
                'description',
                'status'
            ])
        );

        return redirect()
            ->route('todos.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);

        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required'
        ]);

        $todo = Todo::findOrFail($id);

        $todo->update(
            $request->only([
                'title',
                'description',
                'status'
            ])
        );

        return redirect()
            ->route('todos.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Todo::destroy($id);

        return redirect()
            ->route('todos.index')
            ->with('success', 'Data berhasil dihapus');
    }
}