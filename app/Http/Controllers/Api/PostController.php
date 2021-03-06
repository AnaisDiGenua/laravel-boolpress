<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {   
        //per prendere tutti i post
        // $posts = Post::all();
        
        // filtro per prendere solo i post pubblicati
        $posts = Post::where("published", true)->with(["category", "tags"])->get();

        //restituisco i dati sotto forma di json
        return response()->json($posts);
    }

    public function show($slug)
    {
        $post = Post::where("slug", $slug)->with(["category", "tags", "comments" => function($query){
            $query->where('approved','1');
        }])->first();

        //404
        if(empty($post)) {
            return response()->json(["message" => "Not found"], 404);
        }

        //restituisco il dato sotto forma di json
        return response()->json($post);
    }
}
