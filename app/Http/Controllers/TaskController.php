<?php

namespace App\Http\Controllers;

use App\Mail\NotificationMail;
use App\Models\Notification;
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

    public function not_stated()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get()->where('user_id', Auth::id())->where('status', 'non_commencé');
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
        $tasks = Task::orderBy('created_at', 'desc')->get()->where('user_id', Auth::id())->where('status', 'en_cours');
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
        $tasks = Task::orderBy('created_at', 'desc')->get()->where('user_id', Auth::id())->where('status', 'terminé');
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
        return redirect()->back()->with('success','Le statut de la tâche a été mis à jour avec succès.');
    }

    public function sendEmail($username, $name, $title, $mail)
    {
        $details = [ 'title' => 'Une nouvelle tâche vous a été assignée',
            'body' => "Hello, $username une nouvelle tâche vous a été assigné sur le projet ".
                $title." par ".$name.". Veuillez consulter votre liste de tâche. "
        ];
        Mail::to($mail)->send(new NotificationMail($details));
        return 'Email envoyé avec succès';
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
                "Hello $user->name une nouvelle tâche vous a été assigné sur le projet ".
                $task->project->title." par ".$task->project->user->name." . Veuillez consulter votre liste de tâche",
            'is_read' =>false,
        ]);

        $this->sendEmail($user->name, $task->project->user->name, $task->project->title,$request->input('email'));

        return redirect()->back()->with('success','Tâche déléguée à '.$user->name.' avec succès.');
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

        return redirect()->back()->with('success','Task created and added to project '.$task->project->title .' with success');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|max:255',
            'priority' => 'required|in:low,medium,high', ]);

        $task->update($request->all());

        return redirect()->back()->with('success', 'Tâche modifiée avec succès.');
    }

    public function delete(Task $task)
    {
        $task->delete();

        return redirect()->back()->with('success','Tâche supprimée avec succès');
    }
}
