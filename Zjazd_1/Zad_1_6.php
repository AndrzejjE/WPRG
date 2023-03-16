<html lang="pl">
<head>
    <title>Zad_1_6</title>
</head>
<body>
<form method="post">

    <label for="a">Podaj długość a:
        <input type="number" name="a" required>
    </label><br>
    <label for="a">Podaj długość b:
        <input type="number" name="b" required>
    </label><br>
    <label for="a">Podaj długość c:
        <input type="number" name="c" required>
    </label><br>
    <input type="submit" name="submit" value="wynik">
</form>

<?php
if (isset($_POST['submit'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];

    if ($a + $b > $c && $a + $c > $b && $b + $c > $c) {
        echo "Można zbudować trójkąt.";
    } else {
        echo "BŁĄD: Nie mozna zbudować trójkąta z podanych boków.";
    }

}
?>

</body>
</html>

