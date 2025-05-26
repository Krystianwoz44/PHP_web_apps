<?php
session_start();
require_once("DBconnect.php");

if (!isset($_SESSION['user_id']) || $_SESSION['user_level'] != 1) {
    header("Location: admin_login.php");
    exit();
}

$title = "Zarządzanie użytkownikami";
$q = "SELECT user_id, first_name, last_name, email FROM users ORDER BY last_name ASC";
$r = mysqli_query($dbc, $q);
include("admin_loggedin.html");
?>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>E-mail</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td>
                        <a href="admin_edit_user.php?id=<?php echo $row['user_id']; ?>">Edytuj</a> |
                        <a href="admin_delete_user.php?id=<?php echo $row['user_id']; ?>" onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?');">Usuń</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
include("footer.html");
?>