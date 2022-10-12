<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    public function login(){
        $data = [
            "title" => "Login"
        ];
        return view("auth.login" , $data);
    }

    public function register(){
        $data = [
            "title" => "Register"
        ];
        return view("auth.register" , $data);
    }

    public function signUp(UserRequest $request)
    {
        $data = $request->all();
        $data["password"] = Hash::make($request->password);
        $data["balance"] = join("" , explode("." , str_replace( ",00" , "" , $data["balance"])));;
        unset($data["_token"]);

        User::create($data);
        return redirect()->to("login")->with("message" , "Register success, please login!");
    }

    public function signIn(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $credential = $request->all();
        unset($credential["_token"]);

        if(Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->with("message" , "Invalid email or password");
    }

    public function logout(){
        auth()->logout();
        return redirect()->to("/login");
    }

}
