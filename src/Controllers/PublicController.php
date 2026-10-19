<?php
 
namespace App\Controllers;
 
use App\DB;
 
class PublicController {
    public function index() {
        $db = new DB();
        $posts = $db->all('posts');
        dump($posts);
        $users = $db->all('users');
        dump($users);
        $title = 'World';
        view('index', compact('title', 'posts'));
    }
 
    public function us() {
        $title = 'U.S';
        $posts = [
            [
                'title' => 'Some U.S title 1',
                'date' => 'January 1, 2021',
                'author' => 'Pets',
                'body' => 'Some U.S body 1',
            ],
            [
                'title' => 'Some U.S title 2',
                'date' => 'January 4, 2021',
                'author' => 'Jaanus',
                'body' => 'Some U.S body 2',
            ],
            [
                'title' => 'Some U.S title 3',
                'date' => 'January 6, 2021',
                'author' => 'Tseburaska',
                'body' => 'Some U.S body 3',
            ],
            [
                'title' => 'Some U.S title 4',
                'date' => 'January 8, 2021',
                'author' => 'Gena',
                'body' => 'Some U.S body 4',
            ],
        ];
        view('us', compact('posts'));
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