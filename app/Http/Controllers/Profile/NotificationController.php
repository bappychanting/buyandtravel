<?php

namespace App\Http\Controllers\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\GeneralNotification;

class NotificationController extends Controller
{
    protected $notification;

    public function __construct(GeneralNotification $notification, User $user)
    {
        $this->middleware('auth');
        $this->middleware('notifcation.owner')->only('notificationRedirect');
        $this->notification = $notification;        
        $this->user = $user;
    }
    
    public function allNotifications(Request $request)
    {
        $user = $this->user->find(Auth::user()->id);
        $notifications = $user->notifications()->paginate(30);
    	$user->unreadNotifications->markAsRead();
        return view('profile.notification', compact('user', 'notifications'));
    }

    public function newNotifications(Request $request)
    {
    	$user = $this->user->find(Auth::user()->id);
    	$notifications = $user->unreadNotifications()->pluck('data');
    	if($request->markAsRead == 'yes'){
    		$user->unreadNotifications->markAsRead();
    	}
        return json_encode($notifications);
    }
}
