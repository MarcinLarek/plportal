<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Category;
use App\Models\PostCategories;

class PostController extends Controller
{

  public function index(Section $section)
  {

      $posts = $section->getposts();

      $categorylist = Category::where('section_id',$section->id)->get();
      $firstpost = $posts->first();
      $posts = $posts->slice(1)->take(28);
      $sections = Section::get();
      $navbarsection = $section->section;
      return view($section->section.'.index')
       ->with('firstpost', $firstpost)
       ->with('posts', $posts)
       ->with('categories', $categorylist)
       ->with('section', $navbarsection)
       ->with('sections', $sections);
  }

  public function show(Section $section, Post $post)
  {
    $posts = $section->getposts()->sortByDesc('id')->take(10);
    $topposts = $section->getposts()->sortByDesc('reads')->take(10);
    $post->reads++;
    $post->update();
    $categorylist = Category::where('section_id',$section->id)->get();
    $sections = Section::get();
    $admin = Admin::where('id',$post->admin_id)->first();

    return view($section->section.'.show')
    ->with('post', $post)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('section', $section->section)
    ->with('sections', $sections)
    ->with('admin', $admin)
    ->with('categories', $categorylist);
  }

  public function category(Section $section, Category $category)
  {

    $categorylist = PostCategories::where('category_id', $category->id)->get();
    $main = Post::take(0)->get();
    foreach ($categorylist as $catli ) {
      $temp1 = Post::where('id',$catli->post_id)->get();
      foreach ($temp1 as $tempp1) {
        $main->push($tempp1);
      }
    }

    $posts = $section->getposts()->sortByDesc('id')->take(10);
    $topposts = $section->getposts()->sortByDesc('reads')->take(10);
    $categorylist = Category::where('section_id',$section->id)->get();
    $sections = Section::get();

    return view($section->section.'.category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('section', $section->section)
    ->with('sections', $sections)
    ->with('categories', $categorylist);
  }

  public function serach(Section $section, Request $request)
  {

    $serach = $request['serach'];
    $main = Post::where('title','like', '%'.$serach.'%')
                              ->orwhere('postcontent','like', '%'.$serach.'%')
                              ->orderBy('id', 'DESC')
                              ->get();

    $posts = $section->getposts()->sortByDesc('id')->take(10);
    $topposts = $section->getposts()->sortByDesc('reads')->take(10);
    $categorylist = Category::where('section_id',$section->id)->get();
    $sections = Section::get();

    return view($section->section.'.category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('section', $section->section)
    ->with('sections', $sections)
    ->with('categories', $categorylist);
  }

}
