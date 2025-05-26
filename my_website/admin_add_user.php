<?php
session_start();
require_once("DBconnect.php");

if (!isset($_SESSION['user_id']) || $_SESSION['user_level'] != 1) {
    header("Location: admin_login.php");
    exit();
}

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    $last_name = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
    $user_level = isset($_POST['user_level']) ? (int) $_POST['user_level'] : 0;

    if ($first_name && $last_name && $email && $password) {
        $q = "INSERT INTO users (first_name, last_name, email, pass, user_level, registration_date)
              VALUES ('$first_name', '$last_name', '$email', SHA1('$password'), $user_level, NOW())";
        $r = mysqli_query($dbc, $q);

        if (mysqli_affected_rows($dbc) == 1) {
            $success = true;
        } else {
            $errors[] = "Dodanie użytkownika nie powiodło się.";
        }
    } else {
        $errors[] = "Wszystkie pola są wymagane.";
    }
}

$title = "Dodawanie użytkownika";
include("admin_loggedin.html");
if ($success) {
    echo "<p style='color:green;'>Dodano użytkownika.</p>";
}

if (!empty($errors)) {
    echo '<ul style="color:red">';
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo '</ul>';
}
?>
<div>
    <form action="admin_add_user.php" method="POST">
        Imię: <input type="text" name="first_name" required><br><br>
        Nazwisko: <input type="text" name="last_name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Hasło: <input type="password" name="password" required><br><br>
        Poziom użytkownika:
        <select name="user_level">
            <option value="0">Użytkownik</option>
            <option value="1">Administrator</option>
        </select><br><br>
        <input type="submit" value="Dodaj użytkownika">
    </form>
</div>
<?php
include("footer.html");
?>