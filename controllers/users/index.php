<?php
use Models\User;

$users = new User();
// 判斷 Current User 使用權限
// 阻擋 Admin 以外的 Current User, 用 /users 方式檢視 users 資料
authorize($_SESSION["role"] == "Admin");

$users = $users->getUsers($_SESSION["uid"]);
// dumpDie($users);

view("users/index.view.php", [
    'heading' => 'Manage Account',
    'users' => $users,
]);
