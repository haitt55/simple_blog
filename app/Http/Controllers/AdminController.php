<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $post = new Post();
        if ($request->get('filter')) {
            switch ($request->get('filter')) {
                case 'published':
                    $post = $post->where('is_publish', 1);
                    break;
                case 'unpublished':
                    $post = $post->where('is_publish', 0);
                    break;
                default:
                    break;
            }
        }
        if ($request->get('order')) {
            switch ($request->get('order')) {
                case 'date_desc':
                    $post = $post->orderBy('created_at', 'desc');
                    break;
                case 'date_asc':
                    $post = $post->orderBy('created_at', 'asc');
                    break;
                case 'published_first':
                    $post = $post->orderBy('is_publish', 'desc');
                    break;
                case 'unpublished_first':
                    $post = $post->orderBy('is_publish', 'asc');
                    break;
                default:
                    break;
            }
        } else {
            $post = $post->orderBy('id', 'desc');
        }
        $posts = $post->paginate(5);

        return view('admin-home')->with([
            'posts' => $posts,
            'order' => $request->get('order'),
            'filter' => $request->get('filter'),
        ]);
    }
}
