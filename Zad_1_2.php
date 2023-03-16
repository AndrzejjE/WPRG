<html lang="pl">
<head>
    <title>Obliczanie pola prostokąta</title>
</head>
<body>
<h1>Obliczanie pola prostokąta</h1>

<form method="post">

    <label for="a">Podaj długość boku a:
        <input type="number" name="a" required>
    </label><br>


    <label for="b">Podaj długość boku b:
        <input type="number" name="b" required>
    </label><br>

    <input type="submit" name="submit" value="Oblicz pole">
</form>
<?php
if (isset($_POST['submit'])) {
    // pobranie boków a i b z formularza
    $a = $_POST['a'];
    $b = $_POST['b'];

    // obliczenie pola
    $pole = $a * $b;
    // wynik
    echo "Pole prostokąta o bokach $a i $b wynosi: $pole";
}
?>
</body>
</html>
