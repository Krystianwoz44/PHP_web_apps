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
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    $last_name = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $user_level = isset($_POST['user_level']) ? (int) $_POST['user_level'] : 0;
    $password = trim($_POST['password']);

    if ($first_name && $last_name && $email) {
        $q = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', user_level=$user_level";

        if (!empty($password)) {
            $password = mysqli_real_escape_string($dbc, $password);
            $q .= ", pass=SHA1('$password')";
        }

        $q .= " WHERE user_id=$user_id";

        $r = mysqli_query($dbc, $q);
        if (mysqli_affected_rows($dbc) >= 0) {
            header("Location: admin_manage_users.php");
            exit();
        } else {
            $errors[] = "Nie udało się zaktualizować danych użytkownika.";
        }
    } else {
        $errors[] = "Wszystkie pola są wymagane.";
    }
} else {
    $q = "SELECT first_name, last_name, email, user_level FROM users WHERE user_id=$user_id";
    $r = mysqli_query($dbc, $q);
    $user = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $first_name = $user['first_name'];
    $last_name = $user['last_name'];
    $email = $user['email'];
    $user_level = $user['user_level'];
}

$title = "Edycja użytkownika";
include("admin_loggedin.html");
if (!empty($errors)) {
    echo '<ul style="color:red">';
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo '</ul>';
}
?>
<form action="admin_edit_user.php?id=<?php echo $user_id; ?>" method="POST">
    Imię: <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" required><br><br>
    Nazwisko: <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" required><br><br>
    Email: <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br><br>
    Poziom użytkownika:
    <select name="user_level">
        <option value="0" <?php if ($user_level == 0)
            echo 'selected'; ?>>Użytkownik</option>
        <option value="1" <?php if ($user_level == 1)
            echo 'selected'; ?>>Administrator</option>
    </select><br><br>
    Nowe hasło (opcjonalnie): <input type="password" name="password"><br><br>
    <input type="submit" value="Zapisz zmiany">
</form>
<?php
include("footer.html");
?>