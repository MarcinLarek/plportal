<?php

namespace App\Http\Controllers\KobietaFacetDziecko;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KobietaFacetDziecko;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

  public function show(KobietaFacetDziecko $post)
  {
    $posts = DB::table('kobieta_facet_dzieckos')->orderBy('id', 'DESC')->take(10)->get();
    $topposts = DB::table('kobieta_facet_dzieckos')->orderBy('reads', 'DESC')->take(10)->get();
    foreach ($posts as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }
    $post->category = str_getcsv($post->category,"|");

    $post->reads++;
    $post->update();
    $categories = DB::table('category')->get();
    return view('kobietafacetdziecko\show')
    ->with('post', $post)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('categories', $categories);
  }

  public function category($category)
  {
    $main = DB::table('kobieta_facet_dzieckos')->where('category','like', '%'.$category.'%')->orderBy('id', 'DESC')->paginate(10);
    foreach ($main as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }

    $posts = DB::table('kobieta_facet_dzieckos')->orderBy('id', 'DESC')->take(10)->get();
    $topposts = DB::table('kobieta_facet_dzieckos')->orderBy('reads', 'DESC')->take(10)->get();
    foreach ($posts as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }
    $categories = DB::table('category')->get();
    return view('kobietafacetdziecko\category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('categories', $categories);
  }

  public function serach(Request $request)
  {
    $serach = $request['serach'];
    $main = DB::table('kobieta_facet_dzieckos')->where('title','like', '%'.$serach.'%')
                              ->orwhere('postcontent','like', '%'.$serach.'%')
                              ->orderBy('id', 'DESC')
                              ->paginate(10);
    foreach ($main as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }

    $posts = DB::table('kobieta_facet_dzieckos')->orderBy('id', 'DESC')->take(10)->get();
    $topposts = DB::table('kobieta_facet_dzieckos')->orderBy('reads', 'DESC')->take(10)->get();
    foreach ($posts as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }
    $categories = DB::table('category')->get();
    return view('kobieta_facet_dzieckos\category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('categories', $categories);
  }

}
