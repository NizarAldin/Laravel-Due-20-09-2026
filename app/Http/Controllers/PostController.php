<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts-create');
    }

    public function store(Request $request)
    {
        Post::create($request->only('title', 'content'));
        return redirect('/posts');
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts-show', ['post' => $post]);
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts-edit', ['post' => $post]);
    }

    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->only('title', 'content'));
        return redirect('/posts');
    }

    public function destroy(string $id)
    {
        Post::findOrFail($id)->delete();
        return redirect('/posts');
    }
}