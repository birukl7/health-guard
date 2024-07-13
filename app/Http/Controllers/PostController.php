<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Post;
use Illuminate\Validation\Rules\File;

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

    public function edit(Post $post){
        return view('posts.edit',['blog'=>$post]);
    }

    public function update(Request $request, Post $post){
         // dd($request->all());
        $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'duration' => 'required|string',
        'image'=> ['required', File::types(['png', 'jpg', 'webp', 'jpeg', 'gif']) ],
        'issues'=> 'required'
        ]);


        if($request->hasFile('image')){
            $imageFileName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->storeAs('public/post-image', $imageFileName);
        }

        // $user= Auth::user();
        $post->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'duration'=> $request->duration,
            'image'=> $imageFileName,
        ]);

        foreach($post->postTags->pluck('name')->toArray() as $tag){
            $post->removePostTag($tag);
        }

        foreach($request->issues as $tag){
            $post->postTag($tag);
        }
        
        return redirect('/posts')->with('success', 'Post  updated successfully');
    }

    public function store(Request $request)
    {
  
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'duration' => 'required|string',
            'image'=> ['required', File::types(['png', 'jpg', 'webp', 'jpeg', 'gif']) ],
            'issues'=> 'required'
        ]);


        if($request->hasFile('image')){
            $imageFileName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->storeAs('public/post-image', $imageFileName);
        }

        $user= Auth::user();
        $post = $user->healthProfessionalProfile->posts()->create([
            'title'=> $request->title,
            'description'=> $request->description,
            'duration'=> $request->duration,
            'image'=> $imageFileName,
        ]);

        foreach($request->issues as $tag){
            $post->postTag($tag);
        }
      
        return redirect('/posts')->with('success', 'Post created successfully');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect('/dashboard')->with('success', 'Post deleted successfully');
    }
}
