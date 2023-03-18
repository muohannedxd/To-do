<?php

switch ($vars['action']) {

    case "do_add": {
            
            if (!empty($vars['title'])){
                session_start();
                $db->query("INSERT INTO items (title, user_id) VALUES (?, ?)", $vars['title'], $_SESSION['user_id']);
                header("location: todolist.php");
                exit;
            }
            else {
                header("location: todolist.php");
                exit;
            }
        }
        break;

    case "delete": {
            
            $db->query("DELETE FROM items WHERE (item_id) = (?)", $vars['item_id']);
            header("location: todolist.php");
            exit;
        }
        break;

    case "do_editing": {
            session_start();
            $id = $vars['item_id'];
            $title = $vars['title'];
            if (!empty($title)) {
                $db->query("UPDATE items SET title = (?) WHERE item_id = (?)", $title, $id);
              }
            header("location: todolist.php");
            exit;
        }
        break;
}

?>