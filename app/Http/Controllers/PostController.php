<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $request->validate([
            'website_id' => 'required|exists:websites,id',
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = Post::create([
            'website_id' => $request->input('website_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        event(new PostCreated($post));

        return response()->json(['message' => 'Post created successfully']);
    }
}
