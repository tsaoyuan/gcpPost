<?php
session_unset();
session_destroy();

// going to Home page 

view("index.view.php", [
    'heading' => 'Home'
]);