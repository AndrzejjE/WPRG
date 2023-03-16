<html lang="pl">
<head>
    <title>Zad_1_5</title>
</head>
<body>
<form method="post">

    <label for="a">Wpisz dwa napisy oddzielone spacją:
        <input type="text" name="a" required>
    </label><br>
    <input type="submit" name="submit" value="wynik">
</form>

<?php
if (isset($_POST['submit'])) {
    $a = $_POST['a'];
    $napisy = explode(" ", $a);
    $napis1 = $napisy[0];
    $napis2 = $napisy[1];
    $wynik = "%{$napis2} {$napis1}%\$#";
    echo $wynik;
}
?>

</body>
</html>

