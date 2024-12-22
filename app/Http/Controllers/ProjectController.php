<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects= Project::orderBy('created_at', 'desc')->get()->where('user_id', Auth::id());
        $user = User::find(Auth::id());
        $alert = false;
        foreach ($user->notification as $notification){
            if(!($notification->is_read)) {
                $alert = true;
                break;
            }
        }
        return view('projectmanagement',compact('projects','alert'));
    }
    public function in_progress()
    {
        $projects= Project::orderBy('created_at', 'desc')->get()->where('user_id', Auth::id())->where('status', "in progress");

        return view('projectmanagement',compact('projects'));
    }
    public function complete()
    {
        $projects= Project::orderBy('created_at', 'desc')->get()->where('user_id', Auth::id())->where('status', "completed");

        return view('projectmanagement',compact('projects'));
    }

    public function deadline() {
        $projects = Project::orderBy('deadline', 'asc')->get()->where('user_id', Auth::id());
        return view('projectmanagement', compact('projects'));
    }
    public function search(Request $request) {
        $request->validate([ 'name' => 'required|string|max:255', ]);
        $name = $request->input('name');
        $projects = Project::where('title', 'LIKE', '%' . $name . '%')->get()->where('user_id', Auth::id());
        return view('projectmanagement',compact('projects', "name"));
    }

    public function store(Request $request)
    {
        $dateTime = DateTime::createFromFormat('m/d/Y', $request['deadline']);

        $request['deadline'] = $dateTime->format('Y-m-d');

        $request->merge(['user_id' => Auth::id()]);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'user_id'=>'required|exists:users,id',
        ]);

        Project::create($request->all());

        return redirect()->back()->with('success','Project created successfully.');
    }

    public function update(Request $request,Project $project)
    {
        $dateTime = DateTime::createFromFormat('m/d/Y', $request['deadline']);

        $request['deadline'] = $dateTime->format('Y-m-d');

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
        ]);

        $project->update($request->all());

        return redirect()->back()->with('success','Project updated successfully.');
    }

    public function completed (Project $project)
    {
        foreach ($project->tasks as $task) {
            if ($task->status !== 'terminé') {
                return redirect()->back()->with('error','Not all tasks in this project are complete.');
            }
        }

        $project->status = "completed";
        $project->save();

        return redirect()->back()->with('success','Project successfully completed');
    }

    public function destroy(Project $project)
    {
        foreach ($project->tasks as $task) {
            $task->delete();
        }

        $project->delete();

        return redirect()->back()->with('success','Project successfully deleted');
    }
}
