<?php

include("init.php");

if (!isset($vars['action'])){
    $vars['action']='do_signup';
}

include("modules/users.php");
include("modules/todo.php");


?>