<html lang="pl">
<head>
    <title>Zad_1_4</title>
</head>
<body>


<form method="post">

    <label for="a">Podaj pierwszą liczbę:
        <input type="number" name="a" required>
    </label><br>


    <label for="b">Podaj drugą liczbę:
        <input type="number" name="b" required>
    </label><br>

    <input type="submit" name="submit" value="Oblicz">
</form>
<?php
if (isset($_POST['submit'])) {

    $a = $_POST['a'];
    $b = $_POST['b'];

    $dodawanie = $a + $b;
    $odejmowanie = $a - $b;
    $mnozenie = $a * $b;
    $modulo = $a % $b;

    echo "Dodawanie: $a + $b wynosi: $dodawanie<br>";
    echo "Odejmowanie: $a - $b wynosi: $odejmowanie<br>";
    echo "Mnożenie: $a * $b wynosi: $mnozenie<br>";
    echo "Dzielenie modulo: $a % $b wynosi: $modulo<br>";
}
?>
</body>
</html>
