<?php
use Models\Post;

$currentUid = $_SESSION['uid'];
// dumpDie($_SESSION)

// Models/Post
$post = new Post();
$post = $post->getPost($_GET['id']);

// post 權限判斷
authorize($post['Uid'] == $currentUid);

view("posts/show.view.php", [
    'heading' => 'Post',
    'post' => $post 
]);
