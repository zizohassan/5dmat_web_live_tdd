<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function index(){

        $posts = Post::get();

        return view('admin.posts.index' , compact('posts'));

    }

    public function create(){

        return view('admin.posts.create');

    }

    public function store(\App\Http\Requests\Admin\Post $postRequest){

        Post::create($postRequest->all());

        return redirect('admin/posts');

    }
    
    public function edit($id){

        $post = Post::findOrFail($id);

        return view('admin.posts.edit' , compact('post'));

    }

    public function update($id  , \App\Http\Requests\Admin\Post $postRequest){

        $post = Post::findOrFail($id);

        $post->update($postRequest->all());

        return redirect('admin/posts/'.$post->id.'/edit');

    }

    public function delete($id){

        Post::findOrFail($id)->delete();

        return redirect('admin/posts');

    }

}
