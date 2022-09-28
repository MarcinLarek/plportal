<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'section'])->orderBy('id', 'DESC')->take(25)->get();
        $firstpost = $posts->first();
        $posts->shift();
        $sections = Section::get();
        return view('plportal.index')
            ->with('firstpost', $firstpost)
            ->with('posts', $posts)
            ->with('sections', $sections);
    }
}
