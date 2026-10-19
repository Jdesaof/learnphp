<?php
 
namespace App\Controllers;
 
use App\Models\Post;
use App\Models\User;
use App\DB;
 
class PublicController {
    public function index() {
        $posts = Post::all();
        $title = 'World';
        view('index', compact('title', 'posts'));
    }
 
    public function us() {
        $title = 'U.S';
         $posts = Post::all();
        view('posts\index', compact('posts'));
    }
 
    public function tech() {
    $title = 'Technology';

    

    $posts = [
        [
            'title' => 'Cyberpunk',
            'date' => 'October 1, 2026',
            'author' => 'Daniil',
            'body' => 'CyberPunk is a futuristic genre that explores the intersection of technology and society.',
        ],
        [
            'title' => 'New Smartphones',
            'date' => 'September 28, 2026',
            'author' => 'Daniil',
            'body' => 'Modern smartphones are becoming faster and more powerful every year.',
        ],
        [
            'title' => 'Web Technologies',
            'date' => 'September 25, 2026',
            'author' => 'Daniil',
            'body' => 'Web technologies continue to develop and make websites faster and easier to use.',
        ],
    ];

    include __DIR__ . '/../../views/tech.php';
}

}