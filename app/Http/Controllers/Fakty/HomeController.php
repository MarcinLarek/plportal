<?php

namespace App\Http\Controllers\Fakty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $categories = DB::table('category')->get();
        $firstpost = DB::table('posts')->orderBy('id', 'DESC')->first();
        $posts = DB::table('posts')->orderBy('id', 'DESC')->skip(1)->take(28)->get();
        foreach ($posts as $post) {
          $post->category = str_getcsv($post->category,"|");
        }

        return view('fakty\index')
         ->with('firstpost', $firstpost)
         ->with('posts', $posts)
         ->with('categories', $categories);
    }
}
