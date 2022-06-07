<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CommentsController extends Controller
{
    public function index()
    {
       
    }

    public function create(Blog $blog) 
    {
        return Inertia::render('Comment/Create', [
            'blog' => $blog,
        ]);
    }

    public function store(Request $request, Blog $blog) 
    {
        // dd($blog);
        $blog->comments()->create([
            'comment' => $request->comment,
        ]);

        return Redirect::route('blog');

        // Blog::comments()->create($request->validate([
        //     'comment' => 'required'
        // ]));
        // return redirect()->back();

        // Comments::create($request->validate([
        //     'comment' => $request->comment,
        //     'blog_id' => $request->blog
        // ]));

    }



}

