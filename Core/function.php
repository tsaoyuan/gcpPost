<?php
use Core\Response;
// var_dump($value) and die()
function dumpDie($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

// return true or false
function urlIs($value){
    return $_SERVER['REQUEST_URI'] == $value;
}

// post 權限判斷
function authorize($condition, $status = Response::FORBIDDEN)
{
    if(!$condition){
      abort($status);
    }
}

function authorizeLogin($conditionUid, $conditionPwd, $status = Response::FORBIDDEN)
{
  if (!$conditionUid || !$conditionPwd) {
      abort($status);
  }
  // abort(200);

  // user 登入成功 跳轉首頁 
  // view("index.view.php", [
  //   'heading' => 'Home'
  // ]);
}

// relative path function (path hleper function)
// why can I use BASE_PATH? index.php require function.php, then function can use `BASE_PATH`
function base_path($path){
  return BASE_PATH.$path;
}

function view($path, $attributes = []){
  // 用 extract() 將 $heading 代入 function view()
  // extract() 將 array key 作為 varaible 使用，因此 $attributes 陣列的 'heading' 無須寫作成 '$heading'
  extract($attributes);
  require base_path('views/'.$path); // views/index.view.php
}

