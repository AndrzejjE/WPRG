<?php


if (isset($_POST['submit'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $dzialanie = $_POST['dzialanie'];

    require 'Do_zad_3_1.php';

    switch ($dzialanie) {
        case '+':
            $wynik = dodaj($a, $b);
            break;
        case '-':
            $wynik = odejmij($a, $b);
            break;
        case '*':
            $wynik = pomnoz($a, $b);
            break;
        case '/':
            $wynik = podziel($a, $b);
            break;
    }

    $wynik = $a . $dzialanie . $b . "=" . $wynik;
}
?>

<html lang="pl">
<head>
    <title>Zad_3_1</title>
</head>
<body>
<h1>Prosty kalkulator</h1>

<form method="post">

    <label for="a">Liczba 1:
        <input type="number" name="a" required>
    </label><br>
    <select name="dzialanie">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
    </select><br>

    <label for="b">Liczba 2:
        <input type="number" name="b" required>
    </label><br>

    <input type="submit" name="submit" value="Oblicz">
</form>

<div id="wynik">
    <?php
    if (isset($wynik)) {
        echo $wynik;
    }
    ?>
</div>

</body>
</html>
