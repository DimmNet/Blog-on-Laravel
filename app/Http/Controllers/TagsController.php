<?php

namespace App\Http\Controllers;

use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag = null)
    {
        $posts = $tag->posts;

        return view('posts.index', compact('posts'));
    }
}
