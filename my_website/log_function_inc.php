<?php
session_start();

function check_login($dbc, $email, $haslo) {
    $email = mysqli_real_escape_string($dbc, trim($email));
    $haslo = mysqli_real_escape_string($dbc, trim($haslo));

    $q = "SELECT user_id, first_name, last_name, user_level FROM users WHERE email='$email' AND pass=SHA1('$haslo')";
    $r = mysqli_query($dbc, $q);

    if (mysqli_num_rows($r) == 1) {
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['user_level'] = $row['user_level'];

        return [true, $row];
    } else {
        $errors[] = "Wprowadzony e-mail lub hasło są nieprawidłowe";
        return [false, $errors];
    }
}
?>
