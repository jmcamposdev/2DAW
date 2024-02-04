<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all tasks ordered by creation date
        $tasks = Task::orderBy('created_at', 'desc')->get(); 

        // Pass tasks to view
        return view('tasks.index', compact('tasks')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate message field
        $validatedData = $request->validate([
            'message' => 'required|max:255', // Validate message field
        ]);

        // Create the task if validation is ok
        Task::create($validatedData);

        // Redirect to tasks.index view with a success message
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task) {
        // Validate message field
        $validatedData = $request->validate([
            'message' => 'required|max:255', // Validate message field
        ]);

        // Update the task if validation is ok
        $task->update($validatedData);

        // Redirect to tasks.index view with a success message
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function toggleCompleted(Request $request, Task $task) {
        // Toggle completed field
        $task->completed = !$task->completed;

        // Save the task
        $task->save();

        // Redirect to tasks.index view with a success message
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task) {
        // Delete the task
        $task->delete();
        
        // Redirect to tasks.index view with a success message
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
