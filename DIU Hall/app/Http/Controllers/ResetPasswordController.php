<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function getPassword($token) {

        return view('Frontend.auth.reset1', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',

        ]);

        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])
            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('reset1', 'You are Already Changed Your Password!');
        }


        $user = User::where('email', $request->email)
           ->update(['password' => Hash::make($request->password)]);




        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');

    }
}