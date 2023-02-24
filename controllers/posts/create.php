<?php
require base_path('/Core/Validator.php');
// use Core\Database;
use Core\Vaildator;
use Models\Post;

// $db = new Database();
$post = new Post();

// before insert into check
$errors = [];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // mearge title empty input and title maximum number of characters
    if(!Vaildator::string($_POST['title'], 1, 250)){
        $errors['title'] = 'The title of no more than 250 characters is required.'; 
    } 

    // title have words, then insert into value
    if(empty($errors)){
        
        // $db->query("INSERT INTO `Posts` (`Uid`, `Title`) VALUES (:Uid, :Title)", [
        //     // ":Uid" => "Andy Run",
        //     ":Uid" => $_SESSION['uid'],
        //     ":Title" => $_POST['title']
        // ]);

        $post->save($_SESSION['uid'], $_POST['title']);

    }

}

view("posts/create.view.php", [
    'heading' => 'Create Post',
    'errors'=> $errors 
]);