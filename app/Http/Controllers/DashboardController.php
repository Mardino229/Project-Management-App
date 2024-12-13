<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $projectsDetails =[];
        foreach ($user->projects as $project)
        {
            $tasks = $project->tasks;

            $non_commence = $tasks->where('status','non_commencé')->count();
            $en_cours = $tasks->where('status','en_cours')->count();
            $termine = $tasks->where('status','terminé')->count();

            $deadline = Carbon::parse($project->deadline);
            $today = Carbon::today();
            $diffInDays = $today->diffInDays($deadline);

            $projectsDetails[]= new ProjectDetails(
                $project->title,
                $non_commence,
                $en_cours,
                $termine,
                $tasks->count(),
                ( $tasks->count()==0? 0 : $termine / $tasks->count()) * 100,
                $diffInDays
            );

//            $not_started = $not_started + $non_commence;
//            $in_progress = $in_progress + $en_cours;
//            $completed = $completed + $termine;

        }
        $not_started = Task::all()->where('user_id', Auth::id())->where('status','non_commencé')->count();
        $in_progress = Task::all()->where('user_id', Auth::id())->where('status','en_cours')->count();
        $completed = Task::all()->where('user_id', Auth::id())->where('status','terminé')->count();
        $total = $not_started + $in_progress + $completed;

        $user = User::find(Auth::id());
        $alert = false;
        foreach ($user->notification as $notification){
            if(!($notification->is_read)) {
                $alert = true;
            }
        }

        return view("dashboard",compact('projectsDetails','not_started','in_progress','completed','total', 'alert'));
    }
}

class ProjectDetails
{
    public $title;
    public $not_started;
    public $in_progress;
    public $completed;
    public $total;
    public $percentage;
    public $days;

    public function __construct($title, $not_started, $in_progress, $completed, $total, $percentage, $days)
    {
        $this->title = $title;
        $this->not_started = $not_started;
        $this->in_progress = $in_progress;
        $this->completed = $completed;
        $this->total = $total;
        $this->days = $days;
        $this->percentage = round($percentage, 2);
    }
}
