<?php

namespace App\Http\Controllers\Profile;
use App\Notification;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    protected $notification;

    public function __construct(Notification $notification, User $user)
    {
        $this->middleware('auth');
        $this->notification = $notification;        
        $this->user = $user;
    }
    
    public function allNotifications(Request $request)
    {
        
    }

    public function newNotifications(Request $request)
    {

    }
    
    public function notificationRedirect(Request $request)
    {
        
    }
}
