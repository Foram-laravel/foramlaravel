<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')->orderBy('created_at', 'asc')->paginate(10);
        return view('admin.tasks.index', compact('tasks'));
    }
    public function make()
    {
        return view('admin.tasks.create');
    }
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable|string',
    ]);
        $tasks = DB::table('tasks')->insert([
        'title' => $request->title,
        'description' => $request->description,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    return redirect()->route('admin.tasks.index')->with('success', 'Task created successfully.');
    }
    public function change(Request $request, $id)
    {
       $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        DB::table('tasks')->where('id', $id)->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'updated_at' => now(),
        ]);

        return redirect()->route('admin.tasks.index')->with('success', 'Task updated successfully.');
    }
}