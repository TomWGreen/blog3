<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Return an array of posts for guests
     */
    public function welcome() {
        $posts = Post::get();
        return view('welcome',compact('posts'));
    }

    /**
     * Return an array of posts for authenticated user
     */
    public function dashboard() {
        $posts = Post::with(['user'])->get();
        $user = Auth::user();
        return view('dashboard',compact('posts'));
    }
    
    /**
     * Return the post creation form
     */
    public function createForm() {
        return view('post_form');
    }
          
    /**
     * Save the post - whether new or updating
     */
    public function save(Request $request) {
        $validated = $request->validate([
            //'id' in the case where we are editing the post
            'id' => 'nullable|exists:posts,id',
            'title' => 'required|min:1',
            'content' => 'required|min:1'
        ]);
    
        $user = Auth::user();
        $id = $request->get('id');
        //dd($request);
        //dd($id);
        // if the post does not belong to this user, redirect back to the dashboard without applying the change
        if ($id) {
            $post = Post::query()->find($id);
            if ($post->user->_id !== $user->_id) {
              return redirect()->route('dashboard');
          }
        } else {
            $post = new Post();
            $post->user()->associate($user);
        }
    
        $post->title = $request->get('title');
        $post->content = $request->get('content');
    
        $post->save();
    
        return redirect()->route('dashboard');
    }
    
    /**
     * Edit the post
     */
    public function editForm(Request $request, $id) {
        $post = Post::query()->find($id);
        //dd($id);
        //Only allow editing of existing posts
        if (!$post) {
            return redirect()->route('dashboard');
        }
        return view('post_form', ['post' => $post]);
    }
      
    /**
     * Delete the post
     */
    public function delete(Request $request) {
        $validated = $request->validate([
            'id' => 'exists:posts,id'
        ]);
    
        $post = Post::query()->find($request->get('id'));
        $post->delete();
    
        return redirect()->route('dashboard');
    }
    
    public function saveRating(Request $request)
    {
        request()->validate(['rate' => 'required']);
        $post = Post::find($request->id);

		$post->rateOnce($request->rate);

        return redirect()->route('dashboard');
    }
}
