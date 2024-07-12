<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['blogs' => $posts]);
    }
    public function show(Post $post)
    {
        return view('posts.show', ['blog'=> $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required',
            'description' => 'required',
            'content' => 'required|string',
        ]);



        $blog = new Blog();
        $blog->fill($validatedData);

        $blog->status = 'Approved';
        $blog->user_id = Auth::user()->id;
        $blog->like_count = 0; // No need to set it as it has a default value in the database
        if ($blog->save()) {
            return redirect()->route('posts.index')->with('success', 'Post created successfully');
        } else {
            return back()->withInput()->with('error', 'Post creation failed');
        }
    }
}
