<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Rules\PasswordIsSame;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

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
    public function update(Request $request)
    {
        $request->validate([
            "name" => "required",
            "imgProfile" => File::image()->max(2048)
        ]);

        $data = $request->all();

        if ($request->file("imgProfile")) {
            if (auth()->user()->profile_image) {
                Storage::delete("profileImg/" . auth()->user()->profile_image);
            }

            $imgHashName = $request->file("imgProfile")->hashName();
            $request->file("imgProfile")->storeAs("profileImg", $imgHashName);
            $data["profile_image"] = $imgHashName;
        }


        unset($data["_token"]);
        unset($data["email"]);
        unset($data["password"]);

        User::find(auth()->id())->update($data);
        return redirect()->back()->with("message", "Profile has been updated");
    }

    public function login()
    {
        $data = [
            "title" => "Login"
        ];
        return view("auth.login", $data);
    }

    public function register()
    {
        $data = [
            "title" => "Register"
        ];
        return view("auth.register", $data);
    }

    public function signUp(UserRequest $request)
    {
        $data = $request->all();
        $data["role_id"] = 2;
        $data["password"] = Hash::make($request->password);

        $balance = Helper::storeNumberFormat($data["balance"]);

        $data["current_balance"] = $balance;
        $data["first_balance"] = $balance;

        unset($data["balance"]);
        unset($data["_token"]);

        $user = User::create($data);
        event(new Registered($user));

        return redirect()->to("login")->with("message", "Register success, please verify your email address first!");
    }

    public function signIn(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $credential = $request->all();
        unset($credential["_token"]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();

            User::Rebalance();
            return redirect()->intended("/dashboard");
        }

        return back()->with("message", "Invalid email or password");
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->to("/login");
    }

    public function profileImageShow($path)
    {
        $path = storage_path('app/profileImg/' . $path);

        if (!FacadesFile::exists($path)) {
            abort(404);
        }

        $file = FacadesFile::get($path);
        $type = FacadesFile::mimeType($path);

        $response = FacadesResponse::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            "current-password" => ["required", new PasswordIsSame],
            "password" => "required|min:8|max:15",
            "confirm-password" => "required|same:password"
        ], [
            "confirm-password.same" => "The confirm password and new password must match."
        ]);
        $data = $request->except(["current-password", "confirm-password"]);
        $data["password"] = Hash::make($data["password"]);

        User::find(auth()->id())->update($data);

        return redirect()->back()->with("message", "Password successfully changed.");
    }

    public function verifyUser(Request $request)
    {
        $user = User::find($request->route('id'));
        if (auth()->check()) {
            if ($user->id != auth()->id()) return redirect()->to("/dashboard");
        }

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException();
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        if (auth()->guest()) {
            return redirect("/login")->with("message", "Your email has been verified, please login to continue !");
        }

        return redirect()->to("/dashboard")->with("message", "Your email has been verified.");
    }
}
