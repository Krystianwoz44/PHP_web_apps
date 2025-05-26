<div>
<?php
$title = "Logowanie";
include("loggedin.html");
include("DBconnect.php");
require("log_function_inc.php");
require("login_inc.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    list($success, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);

    if ($success) {
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['first_name'] = $data['first_name'];
        header("Location: index_loggedin.php");
        exit();
    } else {
        show_login_form($data);
    }
} else {
    show_login_form();
}
?>
<a href="admin_login.php">Zaloguj się jako administrator</a>
</div>