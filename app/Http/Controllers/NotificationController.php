<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
    
        if ($notification->read_at === null) {
            $notification->markAsRead();
        }
    
        if (Auth::user()->role === 'admin') {
            return redirect()->route('appointmentlist');
        }
        else {
            return redirect()->route('user.history');
        }
    }

    public function markAllAsRead()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        return redirect()->route('appointmentlist')->with('success', 'All notifications marked as read.');
    }
}


