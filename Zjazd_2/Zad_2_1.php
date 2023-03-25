<html lang="pl">
<head>
    <title>Zad_2_1</title>
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

    <input type="submit" name="submit" value="Oblicz pole">
</form>
<?php
if (isset($_POST['submit'])) {

    $a = $_POST['a'];
    $b = $_POST['b'];
    $dzialanie = $_POST['dzialanie'];


    $wynik = 0;
    switch ($dzialanie) {
        case '+':
            $wynik = $a + $b;
            break;
        case '-':
            $wynik = $a - $b;
            break;
        case '*':
            $wynik = $a * $b;
            break;
        case '/':
            $wynik = $a / $b;
            break;
    }
    echo $a . $dzialanie . $b . "=" . $wynik;
}
?>
</body>
</html>
