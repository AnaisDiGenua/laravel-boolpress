<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        
        // filtro per prendere solo i post pubblicati
        $posts = Post::where("published", true)->with(["category", "tags"])->get();

        return response()->json($posts);
    }
}
