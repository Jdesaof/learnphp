<?php
 
namespace App\Controllers;
 
use Exception;
use PDO;
use PDOException;

class PublicController {
    public function index() {
        $servername = "localhost:33061";
        $username = "root";
        $password = "example";
        $dbname = "learnphp";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }


        $title = 'World';
        view('index', compact('title', 'posts'));
    }
    public function forms() {
        view('forms');
    }
    
    public function answer() {
        dump($_GET, $_POST);
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
        view('us', compact('title', 'posts'));
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