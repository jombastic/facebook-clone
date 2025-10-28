<?php

namespace App\Http\Controllers;

use App\Data\PostData;
use App\Models\Post;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\LaravelData\DataCollection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()
            ->user()->id)
            ->orderBy('created_at', 'desc')
            ->with(['comments.user', 'user'])
            ->get();
        return Inertia::render('User', [
            'user' => User::find(auth()->user()->id),
            'posts' => PostData::collect($posts, DataCollection::class)->include('comments.user', 'user')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Post::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->with(['comments.user', 'user'])
            ->get();
        return Inertia::render('User', [
            'user' => User::find($id),
            'posts' => PostData::collect($posts, DataCollection::class)->include('comments.user', 'user'),
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
