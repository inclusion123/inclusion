<?php

namespace App\Http\Controllers\front\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog_grid()
    {
        return view('front.pages.blogs.blog');
    }
    public function blog_detail()
    {
        return view('front.pages.blogs.blog_detail');
    }
}
