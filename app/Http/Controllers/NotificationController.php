<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications= Notification::orderBy('created_at', 'desc')->get()->where('user_id', Auth::id());
        $user = User::find(Auth::id());
        $alert = false;
        foreach ($user->notification as $notification){
            if(!($notification->is_read)) {
                $alert = true;
                break;
            }
        }
        return view('notifications', compact("notifications", "alert"));
    }

    //Marquer une notification comme lue

    public function markAsRead(Notification $notification)
    {
//        $notifications = auth()->user()->notifications()->findOrFail($id);
        $notification->is_read = true;
        $notification->save();
        return redirect()->back();
    }

    //creer une nouvelle notif(c'est juste pour tester)
    public function store (Request $request)
    {
        $request->validate([
            'message' =>'required|string|max:255',
            'task_id' =>'required|exists:tasks,id',
        ]);

        //Créer la notification
        $notifications = Notification::create([
            'user_id' =>auth()->id(),
            'task_id' =>$request->task_id,
            'message' =>$request->message,
            'is_read' =>false,
        ]);

    }
}
