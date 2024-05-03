<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'image' => '/images/user-placeholder.png',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $friends = Friend::all();

        $randomFriends = $friends->random(rand(1, $friends->count()));
        foreach ($randomFriends as $friend) {
            // Check if the friendship already exists to avoid duplicates
            if (!$user->friends()->where('friend_id', $friend->id)->exists()) {
                $user->friends()->attach($friend->id);
            }
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('posts.index', absolute: false));
    }
}
