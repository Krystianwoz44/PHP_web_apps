<?php
$title = "Rejestracja";
include("header.html");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("DBconnect.php");
    $errors = [];

    $imie = !empty(trim($_POST['imie'])) ? trim($_POST['imie']) : '';
    $nazwisko = !empty(trim($_POST['nazwisko'])) ? trim($_POST['nazwisko']) : '';
    $email = !empty(trim($_POST['email'])) ? trim($_POST['email']) : '';
    $haslo1 = !empty(trim($_POST['haslo'])) ? trim($_POST['haslo']) : '';
    $haslo2 = !empty(trim($_POST['haslo2'])) ? trim($_POST['haslo2']) : '';

    if (!$imie)
        $errors[] = "Podaj imię";
    if (!$nazwisko)
        $errors[] = "Podaj nazwisko";
    if (!$email)
        $errors[] = "Podaj adres e-mail";
    if (!$haslo1 || !$haslo2) {
        $errors[] = "Wprowadź hasło";
    } elseif ($haslo1 !== $haslo2) {
        $errors[] = "Hasła nie są takie same";
    }

    if (empty($errors)) {
        $q = "INSERT INTO users (first_name, last_name, email, pass, registration_date) VALUES ('$imie', '$nazwisko', '$email', SHA1('$haslo1'), NOW())";
        $r = mysqli_query($dbc, $q);

        if ($r) {
            echo "<h2>Zostałeś zarejestrowany/a.</h2>";
            mysqli_close($dbc);
            include("footer.html");
            exit();
        } else {
            echo "<p>Rejestracja nie powiodła się. Spróbuj ponownie później.</p>";
        }
    }
    mysqli_close($dbc);
}
?>

<?php
if (!empty($errors)) {
    echo "<p style='color:red;'>Wystąpiły następujące błędy:</p><ul style='color:red;'>";
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo "</ul><p>Spróbuj jeszcze raz</p>";
}
?>
<div>
    <h2>Zarejestruj się</h2>
    <form action="rejestracja.php" method="POST">
        Imię: <input type="text" name="imie" size="15" maxlength="20" value="<?php if (isset($imie))
            echo htmlspecialchars($imie); ?>" required><br><br>
        Nazwisko: <input type="text" name="nazwisko" size="15" maxlength="20" value="<?php if (isset($nazwisko))
            echo htmlspecialchars($nazwisko); ?>" required><br><br>
        Adres e-mail: <input type="email" name="email" size="20" maxlength="60" value="<?php if (isset($email))
            echo htmlspecialchars($email); ?>" required><br><br>
        Hasło: <input type="password" name="haslo" size="10" maxlength="20" required><br><br>
        Powtórz hasło: <input type="password" name="haslo2" size="10" maxlength="20" required><br><br>
        <input type="submit" value="Zarejestruj">
    </form>
</div>
<?php
include("footer.html");
?>