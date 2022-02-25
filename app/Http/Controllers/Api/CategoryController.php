<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {   
        //per prendere tutte le categorie
        $categories = Category::all();

        //restituisco i dati sotto forma di json
        return response()->json($categories);
    }

    public function show($slug)
    {
        $category = Category::where("slug", $slug)->with("posts")->first();

        //404
        if(empty($category)) {
            return response()->json(["message" => "category not found"], 404);
        }

        //restituisco il dato sotto forma di json
        return response()->json($category);
    }
}
