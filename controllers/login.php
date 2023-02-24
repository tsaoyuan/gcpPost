<?php
require base_path('/Core/Validator.php');
use Core\Database;
use Core\Vaildator;

$db = new Database();
$errors = [];
$currentUid = $_POST["uid"]; 
$currentPwd = $_POST["pwd"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // dumpDie($currentUid);
    
    if (!Vaildator::string($currentUid, 1, 25) || !Vaildator::string($currentPwd, 1, 25)) {
        $errors['emptyInput'] = "Fill in all Fields";
    }else{
        $post = $db->query("SELECT * FROM Users where Uid = :Uid and Pwd = :Pwd", [
        ':Uid' => $currentUid,
        ':Pwd' => $currentPwd
        ])->findOrFail();

        // dumpDie($currentUid);
        // check this user have signup
        // authorizeLogin($post['Uid'] == $currentUid, $post['Pwd'] == $currentPwd);
        authorizeLogin($post['Uid'] == $currentUid, $post['Pwd'] == $currentPwd);
        
        // user have already signup, user imformation set in $user
        $user = $db->query("SELECT * FROM Users where Uid = :Uid and Pwd = :Pwd", [
        ':Uid' => $currentUid,
        ':Pwd' => $currentPwd
        ])->find();

        // session_start();
        // user imformation set in $_SESSION["uid"] and $_SESSION["pwd"]
        $_SESSION["uid"] = $user["Uid"]; 
        $_SESSION["pwd"] = $user["Pwd"]; 
        $_SESSION["role"] = $user["Role"];
        // dumpDie($_SESSION);
    }


}
// if(!isset($_SESSION)){
// check 看 SESSION 內，有無內容！
// SESSION 擺在 public/index.php 等同專案內的 page 都可 get SESSION
if(empty($_SESSION)){
// SESSION 無內容，待在 login 頁面, 顯示 Error 訊息
    view("login.view.php", [
        'heading' => 'Log In',
        'errors' => $errors
    ]);

}else{
// SESSION 有內容，登入；
// user 登入成功 跳轉首頁 
      view("index.view.php", [
        'heading' => 'Home'
      ]);
}
