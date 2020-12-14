<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function changepassword()
    {
        $user = User::find(auth()->user()->id);

        return view('dashboard.user.changepassword', ['user' => $user]);
    }

    public function postchangepassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6'
        ]);

        User::where('id', auth()->user()->id)
            ->update([
                'password' => bcrypt($request->password),
            ]);

        return redirect('/dashboard')->with('status', 'Password sukses diganti.');
    }
}
