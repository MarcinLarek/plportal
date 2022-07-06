<?php

namespace App\Http\Controllers\Biznes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Biznes;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

  public function show(Biznes $post)
  {
    $posts = DB::table('Biznes')->orderBy('id', 'DESC')->take(10)->get();
    $topposts = DB::table('Biznes')->orderBy('reads', 'DESC')->take(10)->get();
    foreach ($posts as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }
    $post->category = str_getcsv($post->category,"|");

    $post->reads++;
    $post->update();
    $categories = DB::table('category')->get();
    return view('biznes\show')
    ->with('post', $post)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('categories', $categories);
  }

  public function category($category)
  {
    $main = DB::table('Biznes')->where('category','like', '%'.$category.'%')->orderBy('id', 'DESC')->paginate(10);
    foreach ($main as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }

    $posts = DB::table('Biznes')->orderBy('id', 'DESC')->take(10)->get();
    $topposts = DB::table('Biznes')->orderBy('reads', 'DESC')->take(10)->get();
    foreach ($posts as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }
    $categories = DB::table('category')->get();
    return view('biznes\category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('categories', $categories);
  }

  public function serach(Request $request)
  {
    $serach = $request['serach'];
    $main = DB::table('Biznes')->where('title','like', '%'.$serach.'%')
                              ->orwhere('postcontent','like', '%'.$serach.'%')
                              ->orderBy('id', 'DESC')
                              ->paginate(10);
    foreach ($main as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }

    $posts = DB::table('Biznes')->orderBy('id', 'DESC')->take(42)->get();
    foreach ($posts as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }
    $topposts = DB::table('Biznes')->orderBy('reads', 'DESC')->take(10)->get();
    $categories = DB::table('category')->get();
    return view('biznes\category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('categories', $categories);
  }

}
