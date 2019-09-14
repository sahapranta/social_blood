<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarkAsReadController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
