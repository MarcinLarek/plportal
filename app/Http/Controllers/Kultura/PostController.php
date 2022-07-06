<?php

namespace App\Http\Controllers\Kultura;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kultura;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

  public function show(Kultura $post)
  {
    $posts = DB::table('kulturas')->orderBy('id', 'DESC')->take(10)->get();
    $topposts = DB::table('kulturas')->orderBy('reads', 'DESC')->take(10)->get();
    foreach ($posts as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }
    $post->category = str_getcsv($post->category,"|");

    $post->reads++;
    $post->update();
    $categories = DB::table('category')->get();
    return view('kultura\show')
    ->with('post', $post)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('categories', $categories);
  }

  public function category($category)
  {
    $main = DB::table('kulturas')->where('category','like', '%'.$category.'%')->orderBy('id', 'DESC')->paginate(10);
    foreach ($main as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }

    $posts = DB::table('kulturas')->orderBy('id', 'DESC')->take(10)->get();
    $topposts = DB::table('kulturas')->orderBy('reads', 'DESC')->take(10)->get();
    foreach ($posts as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }
    $categories = DB::table('category')->get();
    return view('kultura\category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('categories', $categories);
  }

  public function serach(Request $request)
  {
    $serach = $request['serach'];
    $main = DB::table('kulturas')->where('title','like', '%'.$serach.'%')
                              ->orwhere('postcontent','like', '%'.$serach.'%')
                              ->orderBy('id', 'DESC')
                              ->paginate(10);
    foreach ($main as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }

    $posts = DB::table('kulturas')->orderBy('id', 'DESC')->take(10)->get();
    $topposts = DB::table('kulturas')->orderBy('reads', 'DESC')->take(10)->get();
    foreach ($posts as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }
    $categories = DB::table('category')->get();
    return view('kultura\category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('categories', $categories);
  }

}
