<?php

include("init.php");

if (!isset($vars['action'])){
    $vars['action']='do_login';
}

include("modules/users.php");
include("modules/todo.php");


?>