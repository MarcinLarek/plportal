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
       $firstpost = Post::orderBy('id', 'DESC')->first();
       $posts = Post::orderBy('id', 'DESC')->take(28)->get();
       $sections = Section::get();
         return view('plportal.index')
         ->with('firstpost', $firstpost)
         ->with('posts', $posts)
         ->with('sections', $sections);
     }

}
