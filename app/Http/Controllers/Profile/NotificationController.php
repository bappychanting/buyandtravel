<?php

namespace App\Http\Controllers\Profile;
use App\Notification;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    protected $Notification;

    public function __construct(Notification $Notification, User $user)
    {
        $this->middleware('auth');
        $this->Notification = $Notification;        
        $this->user = $user;
    }

    public function generateNotification(Request $request)
    {
        
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
