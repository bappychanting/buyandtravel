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
        $this->notification = $notification;        
        $this->user = $user;
    }
    
    public function allNotifications(Request $request)
    {
        $user = $this->user->find(Auth::user()->id);
        return view('profile.notification', compact('user'));
    }

    public function newNotifications(Request $request)
    {

    }
    
    public function notificationRedirect(Request $request)
    {
        
    }
}
