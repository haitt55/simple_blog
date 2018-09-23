<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Show the application index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('is_publish', 1)->orderBy('id', 'desc')->paginate(5);
        return view('index')->with([
            'posts' => $posts
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $posts = Post::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(5);
        return view('home')->with([
            'posts' => $posts
        ]);
    }
}
