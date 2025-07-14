<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //login
    public function login(Request $request)
    {
        // check login or not  ? 
        if(Auth::user()){
            return redirect()->intended('/');
        }

        if($request->isMethod("POST")){
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
        
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }

            return back()->with(['status' => false, "msg" => "Credentials doesn't match!"]);
        }

        return view('frontend.login');
    }
    // logout
    public function logout(Request $request)
    {
        Auth::logout(); // Logs out the user

        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerates the CSRF token

        return redirect('/')->with(['status' => true, 'msg' => 'Logged out successfully!']);
    }

    //register
    public function register()
    {
        return view('frontend.register');
    }
}
