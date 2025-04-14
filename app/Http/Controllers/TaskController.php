<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();
        $projectId = $request->get('project_id', $projects->first()->id ?? null);
        $tasks = Task::where('project_id', $projectId)->orderBy('priority')->get();
        return view('tasks.index', compact('tasks', 'projects', 'projectId'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
        ]);
        $maxPriority = Task::where('project_id', $data['project_id'])->max('priority') ?? 0;
        $data['priority'] = $maxPriority + 1;
        Task::create($data);
        return redirect()->route('tasks.index', ['project_id' => $data['project_id']]);
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $task->update($data);
        return back();
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }

    public function reorder(Request $request)
    {
        $tasks = $request->input('tasks');
        foreach ($tasks as $index => $taskId) {
            Task::where('id', $taskId)->update(['priority' => $index + 1]);
        }
        return response()->json(['status' => 'success']);
    }
}
