<?php
require base_path("Core/Validator.php");
use Core\Database;
use Core\Vaildator;

$db = new Database();
$message = [];
$signUpUid = $_POST["uid"];
$signUpPwd = $_POST["pwd"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // before insert into check
    // dumpDie($signUpUid);
    
    // mearge title empty input and title maximum number of characters
    if(!Vaildator::string($signUpUid, 1, 25) || !Vaildator::string($signUpPwd, 1, 25)){
        $message["emptyInput"] = "Fill in all Fields";
    }
    
    if(!Vaildator::string($signUpPwd, 1, 4)){
        $message["pwdOverLength"] = "Password Over 4 Code";
    }

    if(isset($_SESSION["sqlMessage"])){
        $message["uidExist"] = $_SESSION["sqlMessage"]; 
        session_unset();
        // dumpDie($_SESSION);
    }

    if(empty($message)){
        
        $db->query("INSERT INTO `Users` (`Uid`, `Pwd`) VALUES (:Uid, :Pwd)", [
            ":Uid" => $signUpUid,
            ":Pwd" => $signUpPwd
        ]);

        $message["SignUpSucess"] = "Sign Up Sucess.. wait 2 sceond";
        // dumpDie($message);
        header("Refresh: 2; url=/login");
    }
    
}

view("users/create.view.php", [
    "heading" => 'Sign Up',
    "message"=> $message 
]);