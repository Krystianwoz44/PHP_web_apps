
<?php
session_start();

$_SESSION = [];
session_destroy();
$title = "Wylogowanie";
include("header.html");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wylogowano</title>
</head>
<body>
    <h2>Zostałeś bezpiecznie wylogowany.</h2>
    <p><a href="login.php">Zaloguj się ponownie</a></p>
</body>
<?php
include("footer.html");
?>
</html>