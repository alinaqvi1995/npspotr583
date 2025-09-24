<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query();

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('excerpt', 'LIKE', "%{$search}%")
                    ->orWhere('tags', 'LIKE', "%{$search}%")
                    ->orWhere('heading_one', 'LIKE', "%{$search}%")
                    ->orWhere('slug', 'LIKE', "%{$search}%")
            });
        }

        $blogs = $query->latest()->get();

        return view('site.blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $recentBlogs = Blog::where('id', '!=', $blog->id)->latest()->take(5)->get();
        $categories = Category::where('status', 1)
            ->with('blogs')
            ->has('blogs')
            ->get();

        return view('site.blog.show', compact('blog', 'categories', 'recentBlogs'));
    }
}
