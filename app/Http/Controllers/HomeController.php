<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Canvas\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::published()
            ->withUserMeta()
            ->orderByDesc('published_at')
            ->get();

        //$posts->each->append('read_time');

        return view('welcome')->with('posts',$posts);
    }
}
