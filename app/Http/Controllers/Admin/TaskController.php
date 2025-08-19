<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')->orderBy('created_at', 'asc')->paginate(5);
        return view('admin.tasks.index', compact('tasks'));
    }
    public function make()
    {
        return view('admin.tasks.create');
    }
    public function store(StoreTaskRequest $request)
    {
        $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable|string',
    ]);
        $tasks = DB::table('tasks')->insert([
        'title' => $request->title,
        'description' => $request->description,
        'user_id' => auth()->id(), 
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    return redirect()->route('admin.tasks.index')->with('success', 'Task created successfully.');
    }
    public function display(Task $task)
    {
        return view('admin.tasks.display', compact('task'));
    }
    public function change(Task $task)
    {
      if ($task->user_id != auth()->id()) {
        return redirect()->route('admin.tasks.index')->with('error', 'Not allowed!');
    }
 
      return view('admin.tasks.change', compact('task'));
        
    }
    public function update(Request $request, Task $task)
    {
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
    ]);

    DB::table('tasks')->where('id', $task->id)->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'updated_at' => now(),
    ]);
    if ($task->user_id != auth()->id()) {
        return redirect()->route('admin.tasks.index')->with('error', 'Not allowed!');
    }else{
      return redirect()->route('admin.tasks.index')->with('success', 'Task updated successfully.');
    }
    
    }
    public function remove(Task $task)
    {
        $task->delete();
        return redirect()->route('admin.tasks.index')->with('success', 'Task deleted successfully.');
    }
}