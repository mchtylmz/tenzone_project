<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(12);
        return view('site.blog', [
            'blogs' => $blogs
        ]);
    }

    public function detail(Blog $blog)
    {
        return view('site.blog_detail', [
            'blog' => $blog
        ]);
    }
}
