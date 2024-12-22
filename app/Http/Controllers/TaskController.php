<?php

namespace App\Http\Controllers;

use App\Mail\NotificationMail;
use App\Models\Notification;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get()->where('user_id', Auth::id());

        $user = User::find(Auth::id());
        $alert = false;
        foreach ($user->notification as $notification){
            if(!($notification->is_read)) {
                $alert = true;
                break;
            }
        }

        return view('task.all',compact('tasks', 'alert'));
    }

    public function priority() {
        $tasks = Task::orderByRaw("
            CASE
                WHEN priority = 'high' THEN 1
                WHEN priority = 'medium' THEN 2
                WHEN priority = 'low' THEN 3
                ELSE 4
            END
        ")->where('user_id', Auth::id())->get();

        return view('task.all', compact('tasks'));
    }
    public function status() {
        $tasks = Task::orderByRaw("
            CASE
                WHEN status = 'not started' THEN 1
                WHEN status = 'in progress' THEN 2
                WHEN status = 'completed' THEN 3
                ELSE 4
            END
        ")->where('user_id', Auth::id())->get();
        return view('task.all', compact('tasks'));
    }

    public function search(Request $request) {
        $request->validate([ 'name' => 'required|string|max:255', ]);
        $name = $request->input('name');

        $tasks = Task::where('title', 'LIKE', '%' . $name . '%')->get()->where('user_id', Auth::id());
        return view('task.all',compact('tasks', "name"));
    }

    public function not_stated()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get()->where('user_id', Auth::id())->where('status', 'not started');
        $user = User::find(Auth::id());
        $alert = false;
        foreach ($user->notification as $notification){
            if(!($notification->is_read)) {
                $alert = true;
                break;
            }
        }

        return view('task.not-started',compact('tasks', 'alert'));
    }

    public function in_progress()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get()->where('user_id', Auth::id())->where('status', 'in progress');
        $user = User::find(Auth::id());
        $alert = false;
        foreach ($user->notification as $notification){
            if(!($notification->is_read)) {
                $alert = true;
                break;
            }
        }
        return view('task.in-progress',compact('tasks', 'alert'));
    }

    public function completed()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get()->where('user_id', Auth::id())->where('status', 'completed');
        $user = User::find(Auth::id());
        $alert = false;
        foreach ($user->notification as $notification){
            if(!($notification->is_read)) {
                $alert = true;
                break;
            }
        }
        return view('task.completed',compact('tasks', 'alert'));
    }

    public function setStatus(Task $task, string $status ) {
        $task->status =$status;
        $task->save();
        return redirect()->back()->with('success','The status of the task has been updated successfully.');
    }

    public function sendEmail($username, $name, $title, $mail)
    {
        $details = [ 'title' => 'You have been assigned a new task',
            'body' => "Hello, $username a new task has been assigned to you on the ".
                $title." project by ".$name.". Please review your to-do list."
        ];
        Mail::to($mail)->send(new NotificationMail($details));
        return 'Email sent successfully';
    }
    public function delegate(Request $request, Task $task) {
        $request->validate([ 'email' => 'required|email|exists:users,email', ]);
        $user = User::where('email', $request->input('email'))->first();
        $task->user_id = $user->id;
        $task->save();

        Notification::create([
            'user_id' =>$user->id,
            'task_id' =>$task->id,
            'message' =>
                "Hello $user->name You have been assigned a new task on the project ".
                $task->project->title." par ".$task->project->user->name." . Please review your to-do list",
            'is_read' =>false,
        ]);

        $this->sendEmail($user->name, $task->project->user->name, $task->project->title,$request->input('email'));

        return redirect()->back()->with('success','Task successfully delegated to'.$user->name);
    }

    public function store(Request $request, int $id)
    {
        $request["project_id"] = $id;
        $request->merge(['user_id' => Auth::id()]);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority'=>'required|in:low,medium,high',
            'project_id'=> 'required|exists:projects,id',
            'user_id'=>'required|exists:users,id',
        ]);

        $task = Task::create($request->all());
        $project = Project::find($id);
        if ($project->status = "completed") {
            $project->status = "in progress";
            $project->save();
        }
        return redirect()->back()->with('success','Task created and added to project '.$task->project->title .' with success');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|max:255',
            'priority' => 'required|in:low,medium,high', ]);

        $task->update($request->all());

        return redirect()->back()->with('success', 'Task successfully modified.');
    }

    public function delete(Task $task)
    {
        $task->delete();

        return redirect()->back()->with('success','Task Deleted Successfully');
    }
}
