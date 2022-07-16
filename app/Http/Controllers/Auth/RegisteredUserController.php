<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admins.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $attributes = $request->validate([
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'telephone' => ['required','string','max:20'],
            'avatar' => ['required','image'],
            'email' => ['required','string','email','max:255','unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $attributes = array_merge($attributes,[
            'avatar'=>$request->file('avatar')->store('users/avatars'),
            'super_id' => \auth()->id()
        ]);

        $user = User::create($attributes);

        event(new Registered($user));
        return redirect(RouteServiceProvider::HOME);
    }


    public function index(){
         return view('admins.employees.index',[
             'employees'=>\auth()->user()->employees
         ]);
    }
}
