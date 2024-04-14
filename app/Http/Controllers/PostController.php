<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;

class PostController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', ['blogs' => $blogs]);
    }
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('blogs.show', compact('blog'));
    }

    public function create()
    {
        return view('blogs.create');
    }


    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'tag' => 'required|string|max:255',
    //         'read_minutes' => 'required|numeric',
    //         'content' => 'required|string',
    //         'posted_date' => 'required|date',
    //         'image' => 'required|string|max:255', // Assuming the image field is required but not validating its format or size here
    //     ]);

    //     $blog = new Blog();
    //     $blog->fill($validatedData);

    //     $blog->status = 'Approved';
    //     $blog->user_id = Auth::user()->id;
    //     $blog->like_count = 0;
    //     if ($blog->save()) {

    //         return redirect()->route('posts.index')->with('success', 'Post created successfully');
    //     } else {

    //         return back()->withInput()->with('error', 'Post creation failed');
    //     }
    // }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'read_minutes' => 'required|numeric',
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
