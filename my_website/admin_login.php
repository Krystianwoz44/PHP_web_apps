<?php
$title = "Logowanie administratora";
include("admin_loggedin.html");
include("DBconnect.php");
require("log_function_inc.php");
require("login_inc.php");

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    list($success, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);

    if ($success) {
        if ($data['user_level'] == 1) {
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['first_name'] = $data['first_name'];
            $_SESSION['user_level'] = $data['user_level'];
            header("Location: admin_home.php");
            exit();
        } else {
            show_login_form(["Brak uprawnień administratora."], "admin_login.php");
        }
    } else {
        show_login_form($data, "admin_login.php");
    }
} else {
    show_login_form([], "admin_login.php");
}
?>