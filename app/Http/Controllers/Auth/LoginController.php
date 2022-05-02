<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]); 

        if (!auth()->attempt($request->only('username', 'password'))) {
            return back()->with('status', 'Invalid login details');
        }

        if(auth()->user()->is_activated == '0')
        {
            return redirect()->route('dashboard');
        }
        else 
        {
            return back()->with('status','Your Account was Disabled');
        }

            
    }
}
