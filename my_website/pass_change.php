<?php
$title = "Zmiana hasła";
include("header.html");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("DBconnect.php");
    $errors = [];

    $e = !empty(trim($_POST['email'])) ? trim($_POST['email']) : '';
    $p = !empty(trim($_POST['aktualne'])) ? trim($_POST['aktualne']) : '';
    $np1 = !empty(trim($_POST['nowe'])) ? trim($_POST['nowe']) : '';
    $np2 = !empty(trim($_POST['nowe2'])) ? trim($_POST['nowe2']) : '';

    if (!$e)
        $errors[] = "Wpisz adres e-mail";
    if (!$p)
        $errors[] = "Wpisz obecne hasło";
    if (!$np1 || !$np2) {
        $errors[] = "Wprowadź nowe hasło";
    } elseif ($np1 !== $np2) {
        $errors[] = "Hasła nie są takie same";
    }

    if (empty($errors)) {
        $q = "SELECT user_id FROM users WHERE email='$e' AND pass=SHA1('$p')";
        $r = mysqli_query($dbc, $q);
        $num = mysqli_num_rows($r);

        if ($num == 1) {
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            $uid = $row['user_id'];

            $q = "UPDATE users SET pass=SHA1('$np1') WHERE user_id=$uid";
            $r = mysqli_query($dbc, $q);

            if (mysqli_affected_rows($dbc) == 1) {
                echo "<p>Hasło zostało zmienione.</p>";
            } else {
                echo "<p>Hasło nie zostało zmienione. Spróbuj ponownie.</p>";
            }
            mysqli_close($dbc);
            include("footer.html");
            exit();
        } else {
            echo "<p>Niepoprawny adres e-mail lub hasło.</p>";
        }
    }
    mysqli_close($dbc);
}
?>
<div>
    <h2>Zmiana hasła</h2>
    <?php
    if (!empty($errors)) {
        foreach ($errors as $msg) {
            echo "<p style='color:red;'>$msg</p>";
        }
    }
    ?>

    <form action="zmiana_hasla.php" method="POST">
        Adres e-mail: <input type="email" name="email" size="20" maxlength="60" required><br><br>
        Aktualne hasło: <input type="password" name="aktualne" size="10" maxlength="20" required><br><br>
        Nowe hasło: <input type="password" name="nowe" size="10" maxlength="20" required><br><br>
        Potwierdź nowe hasło: <input type="password" name="nowe2" size="10" maxlength="20" required><br><br>
        <input type="submit" value="Zmień hasło">
    </form>
</div>
<?php
include("footer.html");
?>