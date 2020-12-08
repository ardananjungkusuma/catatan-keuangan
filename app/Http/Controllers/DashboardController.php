<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data_user = User::find(auth()->user()->id);
        // dd($data_user);
        return view('dashboard.user.dashboard', ['user' => $data_user]);
    }
}
