<?php
session_start();
require_once("DBconnect.php");

if (!isset($_SESSION['user_id']) || $_SESSION['user_level'] != 1) {
    header("Location: admin_login.php");
    exit();
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: admin_manage_users.php");
    exit();
}

$user_id = (int) $_GET['id'];

// Nie pozwalaj adminowi usunąć samego siebie
if ($_SESSION['user_id'] == $user_id) {
    header("Location: admin_manage_users.php");
    exit();
}

$q = "DELETE FROM users WHERE user_id = $user_id LIMIT 1";
$r = mysqli_query($dbc, $q);

if (mysqli_affected_rows($dbc) == 1) {
    header("Location: admin_manage_users.php");
    exit();
} else {
    echo "<p style='color:red;'>Nie udało się usunąć użytkownika.</p>";
    echo "<p><a href='admin_manage_users.php'>Wróć do listy</a></p>";
}
?>
