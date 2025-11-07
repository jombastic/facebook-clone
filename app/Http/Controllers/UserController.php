<?php

namespace App\Http\Controllers;

use App\Data\PostData;
use App\Data\UserData;
use App\Models\Post;
use App\Models\User;
use App\Services\ImageService;
use App\Services\PostService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\LaravelData\DataCollection;

class UserController extends Controller
{
    public function __construct(public PostService $postService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('User', [
            'user' => fn() => UserData::from(auth()->user()),
            'posts' => fn() => PostData::collect($this->postService->getPostsForCurrentUser())
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Inertia::render('User', [
            'user' => fn() => UserData::from(User::find($id)),
            'posts' => fn() => PostData::collect($this->postService->getPostsForUser((int) $id)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateImage(Request $request)
    {
        $request->validate(['image' => 'required|mimes:jpg,jpeg,png']);
        $user = (new ImageService)->updateImage(auth()->user(), $request);
        $user->save();
    }
}
