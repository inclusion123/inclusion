<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function blog_grid()
    {
        $blogs = Blog::all();
        return view('front.pages.blogs.index', compact('blogs'));
    }
    public function blog_detail()
    {
        if (isset($_GET['tag'])) {
            $tag = $_GET['tag'];
            $blogs = Blog::withAnyTag($tag)->get();
            return view('front.pages.blogs.index', compact('blogs'));
        }
        if (isset($_GET['s'])) {
            $slug =  $_GET['s'];
            $blog = Blog::where('slug', $slug)->first();
            $count = $blog->comments()->count();
            $comments = $blog->comments()->paginate(3);
            return view('front.pages.blogs.blog_detail', compact('blog', 'comments', 'count'));
        }
    }
    public function comment(Request $request)
    {
        try {
            $comment = Comment::create([
                'blog_id' => $request->blog_id,
                'commenters_name' => $request->name,
                'commenters_email' => $request->email,
                'comment' => $request->comment
            ]);

            return response()->json("comment done");
        } catch (\Exception $e) {
            Log::error('error', $e->getMessage());
        }
    }
   
}
