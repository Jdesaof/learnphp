<?php
 
namespace App\Controllers;
 
use App\Models\Post;
use App\Models\User;
use App\DB;
 
class PostController {
    public function index() {
        $posts = Post::all();
        view('posts/index', compact('posts'));
    }
 
}