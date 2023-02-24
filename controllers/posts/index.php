<?php
use Models\Post;

$posts = new Post();
// 依照 users role, 顯示對應內容
// $posts = $posts->getPostsByRole($_SESSION["uid"], $_SESSION["role"]);

$posts = $posts->getPosts($_SESSION["uid"]);
// dumpDie($posts);
if(isset($_SESSION["uid"])){
    $currentUser = htmlspecialchars($_SESSION["uid"]) ;
}

view("posts/index.view.php", [
    'heading' => 'Posts',
    'posts' => $posts,
    'currentUser' => $currentUser
]);
