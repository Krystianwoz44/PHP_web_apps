<?php
$title = "Kalkulator podróży";
include("header.html");

function renderRadio($value, $name, $default)
{
    $checked = ($value == $default) ? 'checked' : '';
    echo "<input type='radio' name='$name' value='$value' $checked> $value zł/l<br>";
}

$dystans = $cena = $zuzycie = $spalanie = $koszt = $czas = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['dystans']) || !is_numeric($_POST['dystans'])) {
        $errors[] = "Podaj poprawny dystans w kilometrach.";
    } else {
        $dystans = (int) $_POST['dystans'];
    }

    $cena = isset($_POST['cena']) ? (float) $_POST['cena'] : 0;
    $zuzycie = isset($_POST['zuzycie']) ? (float) $_POST['zuzycie'] : 0;

    if (empty($errors)) {
        $spalanie = $dystans / $zuzycie;
        $koszt = round($spalanie * $cena, 2);
        $czas = round($dystans / 75, 2);
    }
}
?>

<div>
    <?php
    if (!empty($errors)) {
        foreach ($errors as $e) {
            echo "<p style='color:red;'>$e</p>";
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<h2>Wyniki:</h2>";
        echo "<p>Spalone paliwo: " . round($spalanie, 2) . " l</p>";
        echo "<p>Koszt podróży: " . $koszt . " zł</p>";
        echo "<p>Czas podróży: " . $czas . " godz.</p>";
    }
    ?>
</div>

<div>
    <h2>Kalkulator podróży</h2>
    <form method="POST">
        Dystans (km): <input type="number" name="dystans" value="<?php echo htmlspecialchars($dystans); ?>"><br><br>
        Średnia cena paliwa:<br>
        <?php
        renderRadio("5.96", "cena", $_POST['cena'] ?? "5.96");
        renderRadio("6.20", "cena", $_POST['cena'] ?? "5.96");
        renderRadio("6.50", "cena", $_POST['cena'] ?? "5.96");
        ?><br>

        Zużycie paliwa:<br>
        <select name="zuzycie">
            <option value="12.5" <?php if (isset($_POST['zuzycie']) && $_POST['zuzycie'] == "12.5")
                echo "selected"; ?>>
                Duże</option>
            <option value="14.2" <?php if (!isset($_POST['zuzycie']) || $_POST['zuzycie'] == "14.2")
                echo "selected"; ?>>
                Przeciętne</option>
            <option value="16.6" <?php if (isset($_POST['zuzycie']) && $_POST['zuzycie'] == "16.6")
                echo "selected"; ?>>
                Niskie</option>
            <option value="20" <?php if (isset($_POST['zuzycie']) && $_POST['zuzycie'] == "20")
                echo "selected"; ?>>
                Rewelacyjne</option>
        </select><br><br>

        <input type="submit" value="Oblicz">
    </form>
</div>
<?php
include("footer.html");
?>