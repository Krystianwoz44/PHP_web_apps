<?php
DEFINE ('DB_USER', 'uzytkownik');
DEFINE ('DB_PASSWORD', 'silnehaslo');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'sitename');

//nawiązywanie połączenia z bazą danych
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Nie można połączyć z bazą danych. ' . mysqli_connect_error() . '.');
# OR die('Nie można połączyć z bazą danych. ' . mysqli_connect_error() . '.')
// if (!$dbc) {
//     die('Nie można połączyć z bazą danych. ' . mysqli_connect_error() . '.');
// } else {
//     echo 'Połączenie z bazą danych zostało nawiązane pomyślnie.';
// }
?>
