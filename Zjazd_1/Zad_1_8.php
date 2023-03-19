<html lang="pl">
<head>
    <title>Zad_1_7</title>
</head>
<body>
<form method="post">

    <label for="a">Podaj pierwszą liczbę:</label>
    <input type="number" name="a" id="a"><br>
    <label for="b">Podaj drugą liczbę:</label>
    <input type="number" name="b" id="b"><br>
    <label for="c">Podaj trzecią liczbę:</label>
    <input type="number" name="c" id="c"><br>
    <input type="submit" name="submit" value="Wyślij">
</form>

<?php
if (isset($_POST['submit'])) {
    $a = floatval($_POST['a']);
    $b = floatval($_POST['b']);
    $c = floatval($_POST['c']);

    $min = $a;
    if ($b < $min) {
        $min = $b;
    }
    if ($c < $min) {
        $min = $c;
    }

    $max = $a;
    if ($b > $max) {
        $max = $b;
    }
    if ($c > $max) {
        $max = $c;
    }

    $middle = ($a + $b + $c) - ($min + $max);

    echo "Liczby w kolejności od najmniejszej do największej: $min $middle $max<br>";

    echo "Liczby w kolejności od największej do najmniejszej: $max $middle $min<br>";


}
?>

</body>
</html>
