<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return response()->json(Blog::select('id', 'title', 'image', 'slug', 'short_description', 'created_at')->get());
    }

    public function post($slug)
    {
        $post = Blog::where('slug', $slug)->first();

        if (!$post) {
            return response()->json(['message' => 'not found'],404); // or handle the case when the post is not found
        }

        return response()->json($post);
    }
}