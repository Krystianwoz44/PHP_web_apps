<?php
session_start();
require_once('DBconnect.php');


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$q = "SELECT last_name, first_name, registration_date FROM users ORDER BY registration_date ASC";
$r = mysqli_query($dbc, $q);

$num_users = mysqli_num_rows($r);
include("loggedin.html");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Użytkownicy</title>
</head>
<body>
    <div>
    <h2>Lista zarejestrowanych użytkowników</h2>
    <p>Liczba użytkowników: <?php echo $num_users; ?></p>

    <ul>
        <?php while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo "<li>";
            echo htmlspecialchars($row['last_name']) . ", " . htmlspecialchars($row['first_name']);
            echo " – " . date("d F Y", strtotime($row['registration_date']));
            echo "</li>";
        } ?>
    </ul>
    </div>
</body>
<?php
include("footer.html");
?>
