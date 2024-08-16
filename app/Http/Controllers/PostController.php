<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest() -> get();
        return view('index') -> with(['posts' => $posts]);
    }

    public function store(PostRequest $request) {
        $post = new Post();
        $post -> name = $request -> name ?? 'Unknown';
        $post -> message = $request -> message;
        $post -> save();

        return redirect() -> route('posts.index');
    }

    public function create() {
        return view('post.index');
    }

    public function show(Post $post) {
        return view('post.edit') -> with(['post' => $post]);
    }

    public function update(PostRequest $request, Post $post) {
        $post -> name = $request -> name ?? 'Unknown';
        $post -> message = $request -> message;
        $post -> save();

        return redirect() -> route('posts.index');
    }

    public function destroy(Post $post) {
        $post -> delete();
        return redirect() -> route('posts.index');
    }

    public function edit(Post $post) {
        return view('posts.edit') -> with(['post' => $post]);
    }
}
