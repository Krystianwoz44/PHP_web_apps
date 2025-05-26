<?php
function show_login_form($errors = [], $action = "login.php") {

    if (!empty($errors)) {
        echo '<h2>Błąd!</h2>';
        echo "<p style='color:red;'>Wystąpiły następujące błędy:</p><ul style='color:red;'>";
        foreach ($errors as $e) {
            echo "<li>$e</li>";
        }
        echo "</ul><p>Proszę spróbować jeszcze raz</p>";
    }

    echo '<div><h2>Logowanie</h2>
        <form action="' . htmlspecialchars($action) . '" method="POST">
            Adres e-mail: <input type="email" name="email"><br><br>
            Hasło: <input type="password" name="pass"><br><br>
            <input type="submit" value="Zaloguj">
        </form></div>';

    include("footer.html");
}
?>