<?php

namespace App\Http\Controllers\KobietaFacetDziecko;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KobietaFacetDziecko;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $firstpost = DB::table('kobieta_facet_dzieckos')->orderBy('id', 'DESC')->first();
        $posts = DB::table('kobieta_facet_dzieckos')->orderBy('id', 'DESC')->skip(1)->take(28)->get();
        foreach ($posts as $post) {
          $post->category = str_getcsv($post->category,"|");
        }
        $categories = DB::table('category')->get();
        return view('kobietafacetdziecko\index')
         ->with('firstpost', $firstpost)
         ->with('posts', $posts)
         ->with('categories', $categories);
    }
}
