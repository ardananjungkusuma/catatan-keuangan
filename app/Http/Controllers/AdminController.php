<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function listuser()
    {
        $user = User::all();
        return view('dashboard.admin.listuser', ['user' => $user]);
    }

    public function manageuser($id)
    {
        $user = User::find($id);
        return view('dashboard.admin.manageuser', ['user' => $user]);
    }

    public function postmanageuser(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required'
        ]);
        $user = User::find($id);
        $user->role = $request->role;
        $user->save();

        return redirect('/admin/listuser')->with('status', 'Sukses Edit User');
    }
}
