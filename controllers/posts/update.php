<?php
require base_path('/Core/Validator.php');
use Core\Vaildator;
use Models\Post;

// dumpDie($_POST);
// dumpDie($_POST["title"]);
$postId = $_POST['postId'];
$postTitle = $_POST['title'];
// dumpDie($postId);

$post = new Post();

$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["update"])) {

        if(!Vaildator::string($postTitle, 1, 250)){
            // Validator Fail
            $result = $post->getPost($postId);
            $errors['title'] = 'The title of no more than 250 characters is required.'; 
            // dumpDie($postTitle.$errors['title']);

            // Validator Fail, then stay updateView.view.php
            view("posts/updateView.view.php", [
                'heading' => 'Update View Post',
                'errors' => $errors,
                'result' => $result
            ]);

        }else{
            // Validator Success
            $post->update($postId, $postTitle);
    
            // 強制轉址：
            header("Location: /posts");
        }
    }
} 