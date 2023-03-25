<html lang="pl">
<head>
    <title>Zad_2_1</title>
</head>
<body>
<h1>Prosty kalkulator</h1>

<form method="post">

    <label for="num">Liczba:
        <input type="number" name="num" required>
    </label><br>
<br>
    <input type="submit" name="submit">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $num = $_POST['num'];

    if (is_int($num)) echo "to jest liczba całkowita!";
    else echo "to nie jest liczba całkowita";

}
?>
</body>
</html>
