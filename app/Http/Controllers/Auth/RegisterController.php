<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
        $data = [];
        $data['name'] = $request->name; 
        $data['email'] = $request->email; 
        $data['username'] = $request->username; 
        $data['password'] = $request->password; 
        $user = User::create($data);

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
