<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Biznes;
use App\Models\Historia;
use App\Models\Hobby;
use App\Models\KobietaFacetDziecko;
use App\Models\Kultura;
use App\Models\Motoryzacja;
use App\Models\NaukaITechnologie;
use App\Models\SalonPolityczny;
use App\Models\SluzbyMundurowe;
use App\Models\Spoleczenstwo;
use App\Models\Sport;
use App\Models\Turystyka;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function create($section)
    {
        $categories = DB::table('category')->where('section', $section)->get();
        return view('admin\create')
              ->with('categories', $categories)
              ->with('section', $section);
    }

    public function store(PostRequest $request)
    {
        $category ="";
        foreach ($request['category'] as $cat) {
            $category .= $cat . "|";
        }
        $request['category'] = $category;
        $imagePath = request('image')->store('uploads', 'public');

        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize('storage/'.$imagePath);

        //ImageOptimizer::optimize('storage/'.$imagePath);

        $data = array(
         'title' => $request['title'],
         'author' => $request['author'],
         'source' => $request['source'],
         'postcontent' => $request['postcontent'],
         'category' => $request['category'],
         'image' => $imagePath,
       );

        switch ($request['section']) {
          case 'Fakty':
              Posts::create($data);
            break;
          case 'Biznes':
              Biznes::create($data);
            break;
          case 'Sport':
              Sport::create($data);
            break;
          case 'Salon polityczny':
              SalonPolityczny::create($data);
            break;
          case 'Kobieta facet dziecko':
              KobietaFacetDziecko::create($data);
            break;
          case 'Hobby':
              Hobby::create($data);
            break;
          case 'Kultura':
              Kultura::create($data);
            break;
          case 'Motoryzacja':
              Motoryzacja::create($data);
            break;
          case 'Nauka i technologie':
              NaukaITechnologie::create($data);
            break;
          case 'Historia':
              Historia::create($data);
            break;
          case 'Sluzby mundurowe':
              SluzbyMundurowe::create($data);
            break;
          case 'Turystyka':
              Turystyka::create($data);
            break;
          case 'Spoleczenstwo':
              Spoleczenstwo::create($data);
            break;
          default:
            // code...
            break;
        }

        return redirect()->back()->with('successalert', 'successalert');
    }
}
