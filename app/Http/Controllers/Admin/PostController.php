<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategories;

class PostController extends Controller
{
    public function create($section)
    {
        $sections = Section::get();
        $tempsection = Section::where('section', $section)->first();
        $category = Category::where('section_id',$tempsection['id'])->get();
        return view('admin\create')
              ->with('sections', $sections)
              ->with('section', $section)
              ->with('category', $category);
    }

    public function store(PostRequest $request)
    {
        $imagePath = request('image')->store('uploads', 'public');
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize('storage/'.$imagePath);

        //ImageOptimizer::optimize('storage/'.$imagePath);

        $data = array(
         'title' => $request['title'],
         'author' => $request['author'],
         'source' => $request['source'],
         'postcontent' => $request['postcontent'],
         'image' => $imagePath,
       );

       Post::create($data);
       $post = Post::latest()->first();
       foreach ($request['category'] as $cat) {
          $data = array(
            'post_id' => $post['id'],
            'category_id' => $cat
          );
        PostCategories::create($data);
       }

        return redirect()->back()->with('successalert', 'successalert');
    }
}
