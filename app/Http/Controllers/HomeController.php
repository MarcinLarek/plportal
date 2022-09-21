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
       $posts = Post::orderBy('id', 'DESC')->take(24)->get();
       $sections = Section::get();
         return view('plportal.index')
         ->with('posts', $posts)
         ->with('sections', $sections);
     }

}
