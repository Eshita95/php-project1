<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function add(Request $request, FlasherInterface $flasher){

        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);


        $post = new Post();
        $post->title = $request->title;
        $post->date = now();
        $post->content = $request->content;
        $post->save();

        $flasher->addSuccess('Post added successfully');

        return redirect()->route('dashboard');
    }

    public function post(Post $posts){

        $posts = Post::all();
        return view('posts', [
            'posts' => $posts,
        ]);

    }

    public function edit($id, FlasherInterface $flasher){
        $post =Post::find($id);

        if(empty($post)){
            $flasher->addError('post not found');
            return redirect()->route('dashboard');
        }

        return view('edit-post', [
            'post' => $post,
        ]);
    }

    public function update($id, Request $request , FlasherInterface $flasher){

        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        $flasher->addSuccess('Post Update successfully');
        return redirect()->route('dashboard');
    }

    public function delete($id, FlasherInterface $flasher){
        $post = Post::findOrFail($id);
        $post->delete();

        $flasher->addSuccess('Post delete successfully');
        return redirect()->route('dashboard');
    }

    public function index(FlasherInterface $flasher){

        // dd($flasher->addSuccess('test'));

        $flasher->addSuccess('Flasher Notification added');

        return view('posts');
    }
}
