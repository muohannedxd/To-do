<?php

include("init.php");

if (!isset($vars['action'])){
    $vars['action']='todo';
}

include("modules/users.php");
include("modules/todo.php");

session_start();
$items = $_SESSION['items'];
foreach ($items as $item) {
    echo $item['title'] . "<br>";
}

?>