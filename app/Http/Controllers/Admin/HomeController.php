<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $categories = DB::table('category')->get();
        return view('admin\index')
        ->with('categories', $categories);
    }

}
