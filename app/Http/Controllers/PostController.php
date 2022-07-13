<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostCategories;

class PostController extends Controller
{

  public function index(Section $section)
  {

      $categorylist = Category::where('section_id',$section->id)->get();
      $filteredcategories = PostCategories::take(0)->get();
      foreach ($categorylist as $catli ) {
        $temp1 = PostCategories::where('category_id',$catli->id)->get();;
        foreach ($temp1 as $tempp1) {
          $filteredcategories->push($tempp1);
        }
      }
      $posttoshow = Post::take(0)->get();
      foreach ($filteredcategories as $filtcat) {
        $temp = Post::where('id', $filtcat->post_id)->get();
        foreach ($temp as $tempp) {
          $posttoshow->push($tempp);
        }
      }
      $posts = $posttoshow->unique();

      $firstpost = $posts->first();
      $posts = $posts->slice(1)->take(28);
      $sections = Section::get();
      $navbarsection = $section->section;
      return view('fakty\index')
       ->with('firstpost', $firstpost)
       ->with('posts', $posts)
       ->with('categories', $categorylist)
       ->with('navbarsection', $navbarsection)
       ->with('sections', $sections);
  }

  public function show(Post $post)
  {
    $posts = DB::table('posts')->orderBy('id', 'DESC')->take(10)->get();
    $topposts = DB::table('posts')->orderBy('reads', 'DESC')->take(10)->get();
    foreach ($posts as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }
    $post->category = str_getcsv($post->category,"|");

    $post->reads++;
    $post->update();
    $categories = DB::table('category')->get();
    return view('fakty\show')
    ->with('post', $post)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('categories', $categories);
  }

  public function category($category)
  {
    $main = DB::table('posts')->where('category','like', '%'.$category.'%')->orderBy('id', 'DESC')->paginate(10);
    foreach ($main as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }

    $posts = DB::table('posts')->orderBy('id', 'DESC')->take(10)->get();
    $topposts = DB::table('posts')->orderBy('reads', 'DESC')->take(10)->get();
    foreach ($posts as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }

    $categories = DB::table('category')->get();
    return view('fakty\category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('categories', $categories);
  }

  public function serach(Request $request)
  {
    $serach = $request['serach'];
    $main = DB::table('posts')->where('title','like', '%'.$serach.'%')
                              ->orwhere('postcontent','like', '%'.$serach.'%')
                              ->orderBy('id', 'DESC')
                              ->paginate(10);
    foreach ($main as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }

    $posts = DB::table('posts')->orderBy('id', 'DESC')->take(10)->get();
    $topposts = DB::table('posts')->orderBy('reads', 'DESC')->take(10)->get();
    foreach ($posts as $post2) {
      $post2->category = str_getcsv($post2->category,"|");
    }
    $categories = DB::table('category')->get();
    return view('fakty\category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('categories', $categories);
  }

}
