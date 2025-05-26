<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_level'] != 1) {
    header('Location: admin_login.php');
    exit();
}

$title = "Zarządzanie użytkownikami";
include("admin_loggedin.html");
?>
<div>
    <h2>Użytkownicy</h2>
    <ul>
        <li><a href="admin_manage_users.php">Zarządzanie użytkownikami</a></li>
        <li><a href="admin_add_user.php">Dodawanie użytkowników</a></li>
        <li><a href="admin_users_list.php">Lista użytkowników</a></li>
    </ul>
</div>
<?php
include("footer.html");
?>