<?php

namespace App\Http\Controllers\Kultura;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kultura;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $firstpost = DB::table('kulturas')->orderBy('id', 'DESC')->first();
        $posts = DB::table('kulturas')->orderBy('id', 'DESC')->skip(1)->take(28)->get();
        foreach ($posts as $post) {
          $post->category = str_getcsv($post->category,"|");
        }
        $categories = DB::table('category')->get();
        return view('kultura\index')
         ->with('firstpost', $firstpost)
         ->with('posts', $posts)
         ->with('categories', $categories);
    }
}
