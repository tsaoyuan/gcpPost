<?php
use Models\User;

$currentUid = $_SESSION["uid"];
// dumpDie($currentUid);
$currentId = $_GET["id"];
// dumpDie($_GET["id"]);

// user 權限判斷
$user = new User();
$role = $user->role();
// dumpDie($role);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Get Selected Values from Select Option
    $currentRole = $_POST["role"]; 
    // dumpDie($currentRole);

    // click Edit( <a> ), then update User role
    if(isset($_POST["edit"])){

        $user->update($currentId, $currentRole);
        header("Location: /users");
    }
}

$result = $user->getUser($_GET["id"]);
// dumpDie($result);

view("users/show.view.php", [
    "heading" => 'Edit User',
    "result" => $result
]);
