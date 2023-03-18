<?php

switch ($vars['action']) {
    case "todo": {
            session_start();
            $items = $db->query('SELECT * FROM items WHERE (user_id) = (?) ', $_SESSION['user_id'])->fetchAll();

            include("view/header.php");
            include("view/list.php");
            include("view/footer.php");
            exit;
        }
        break;

    case "do_signup": {
            $users = $db->query('SELECT * FROM users')->fetchAll();

            include("view/header.php");
            include("view/signup.php");
            include("view/footer.php");
            exit;
        }
        break;

    case "do_login": {
            $users = $db->query('SELECT * FROM users')->fetchAll();

            include("view/header.php");
            include("view/login.php");
            include("view/footer.php");
            exit;
        }
        break;

    case "do_edit": {
            $users = $db->query('SELECT * FROM users')->fetchAll();

            include("view/header.php");
            include("view/update.php");
            include("view/footer.php");
            exit;
        }
        break;

    case "signup": {
            //WORKS********************************************************************
            // Check if the user already exists
            $user = $db->query("SELECT * FROM users WHERE username = ?", $vars['username'])->fetchAll();
            if ($user) {
                // User already exists, redirect back to the signup form with an error message
                header("location: index.php");
                exit;
            }

            $id = 1;
            while (true) {
                $user = $db->query("SELECT * FROM users WHERE user_id = ? ", $id)->fetchAll();
                if ($user) {
                    $id++;
                } else {
                    session_start();
                    //HASHING************************************************************************************
                    $password = $vars['password'];
                    $hashed_password = md5($password);
                    //*********************************************************************************************

                    $db->query("INSERT INTO users ( user_id,  password,  username) VALUES (? , ? , ?)", $id, $hashed_password, $vars['username']);
                    $_SESSION["user_id"] = $id;
                    $_SESSION["username"] = $user["username"];
                    $_SESSION["password"] = $hashed_password;
                    header("location: todolist.php");
                    exit;
                }
            }
        }
        break;

    case "login": {
            // Start session
            session_start();
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $hashed_password = md5($password);

                $user = $db->query("SELECT * FROM users WHERE username = ? ", $username)->fetchArray();
                
                if ($user) {
                    if ($hashed_password === $user['password']) {
                        // Login successful
                        session_start();
                        $_SESSION["user_id"] = $user['user_id'];
                        $_SESSION["username"] = $user["username"];
                        $_SESSION["password"] = $user["password"];
                        // Go to the user's list
                        header("location: todolist.php");
                        exit;
                    } else {
                        // Incorrect password
                        echo "\nIncorrect password.";
                  
                    }
                } else {
                    // Incorrect username
                    echo "Incorrect username.";
                }

            }

        }
        break;

    case "logout": {
            //WORKS
            session_destroy();
            header("location: index2.php");
            exit;
        }
        break;

    case "signout": {
            //WORKS
            session_start();
            $db->query('DELETE FROM items WHERE (user_id) = (?)', $_SESSION['user_id']);
            $db->query(" DELETE FROM users WHERE (user_id) = (?)", $_SESSION["user_id"]);
            session_destroy();
            header("location: index.php");
            exit;
        }
        break;


}

?>