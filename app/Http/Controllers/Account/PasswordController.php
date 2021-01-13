<?php

namespace App\Http\Controllers\Account;

use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('password.edit');
    }

    public function update()
    {
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:5', 'confirmed']

        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $currentPassword)) {
            auth()->user()->update(
                ['password' => Hash::make(request(('password')))]
            );

            return back()->with('success', 'You are changed your password');
        } else {
            return back()->withErrors(['old_password' => 'The old password is worng']);
        }
    }
}
