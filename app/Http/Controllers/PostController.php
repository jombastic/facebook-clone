<?php

namespace App\Http\Controllers;

use App\Data\PostData;
use App\Models\Post;
use App\Services\ImageService;
use App\Services\PostService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = (new PostService)->getAllPosts();

        return Inertia::render('Posts', [
            'posts' => PostData::collect($posts)
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate(['text' => 'required']);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'required|mimes:jpg,jpeg,png']);
            $post = (new ImageService)->updateImage($post, $request);
        }

        $post->user_id = auth()->user()->id;
        $post->text = $request->input('text');
        $post->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $post = Post::find($id);

        if (!empty($post->image)) {
            $currentImage = public_path() . $post->image;

            if (file_exists($currentImage)) {
                unlink($currentImage);
            }
        }

        $post->delete();
    }
}
