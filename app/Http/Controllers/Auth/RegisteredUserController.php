<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use App\Mail\UserSignedUp;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' =>  ['required', 'string', 'max:191'],
            'last_name' =>  ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'newsletter' => ['nullable', 'string'],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'newsletter' => (isset($request->newsletter)) ? true : false,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Sends email to the new registered  user
        Mail::to($request->email)->queue(
            new UserSignedUp()
        );

        return redirect()->route('home.index', false)->with('logInSuccess', 'U heeft succesvol een account aangemaakt!');
    }
}
