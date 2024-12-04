<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function user() {
        $users = User::orderBy('created_at', 'desc')->get();
        $user = User::find(Auth::id());
        $alert = false;
        foreach ($user->notification as $notification){
            if(!($notification->is_read)) {
                $alert = true;
                break;
            }
        }
        return view('admin.usermanagement', compact('users', 'alert'));
    }
    public function project() {
        $projects = Project::orderBy('created_at', 'desc')->get();

        $user = User::find(Auth::id());
        $alert = false;
        foreach ($user->notification as $notification){
            if(!($notification->is_read)) {
                $alert = true;
                break;
            }
        }
        return view('admin.projectmanagement', compact('projects', 'alert'));
    }

    public function updateuser(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'name' => 'required|string|max:255',
        ]);

        $user->update($request->all());
        if($request->role == "admin"){
            $user->assignRole("admin");
        } else {
            $user->assignRole("user");
        }
        $user->save();

        return redirect()->back()->with('success','Utilisateur modifié avec succès.');
    }

    public function deleteuser(User $user): RedirectResponse
    {
        if (!(Auth::user()->email == $user->email)) {
            foreach ($user->project as $project) {
                foreach ($project->tasks as $task) {
                    $task->delete();
                }
                $project->delete();
            }
            $user->delete();
            return redirect()->back()->with('success','Utilisateur supprimé avec succès.');
        } else {
            return redirect()->back()->with('error','Oups☻!! Vous avez essayé de vous supprimé');
        }

    }



}
