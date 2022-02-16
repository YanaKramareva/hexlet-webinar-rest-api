<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
//    public function index()
//    {
//    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $post = new Post();

        $post->fill($validated);

        $post->state = Post::STATE_DRAFT;
        $post->user_id = Auth::id();

        $post->save();

        return response()->json($post, 201);
    }
//
//    public function show(Post $post)
//    {
//        //
//    }
//
//    public function update(Request $request, Post $post)
//    {
//        //
//    }
//
//    public function destroy(Post $post)
//    {
//        //
//    }
}
