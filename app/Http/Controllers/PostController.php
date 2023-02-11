<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index(){

        return view('posts.index',[
        'posts' => Post::orderBy('published_at','asc')->orderBy('views', 'desc')->filter(request(['search','category','author']))->where('status', 'publish')->paginate(6)->withQueryString()
        ]);

    }

    public function show(Post $post) {
        $post->incrementViewsCount();
        return view('posts.show',[
            'post' => $post
        ]);
    }


}
