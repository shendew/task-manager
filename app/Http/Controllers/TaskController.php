<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->orderBy('created_at', 'desc')->paginate(5);

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function filter(Request $request)
    {
        $date = $request->date;
        $tasks = Task::whereDate('created_at', $date)->where('user_id', auth()->id())->orderBy('created_at', 'desc')->paginate(5);

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $validated['user_id'] = auth()->id();
        $validated['status'] = false;
        Task::create($validated);

        return redirect()->route('dashboard')->with('success', 'Task created successfully.');
    }

    public function mark_as_completed(Task $task)
    {
        $task->update(['status' => true]);

        return redirect()->route('dashboard')->with('success', 'Task marked as completed.');
    }

    public function view(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    public function delete(Task $task)
    {
        $task->delete();

        return redirect()->route('dashboard')->with('success', 'Task deleted successfully.');
    }
}
