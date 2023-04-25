<?php
if (isset($_POST['submit'])) {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];

    $plik = fopen('dane.txt', 'a');
    fwrite($plik, $imie . ';' . $nazwisko . PHP_EOL);
    echo '
    <h1>Formularz zapisujący dane do pliku</h1>
    <form method="post" action="">
        <label for="imie">Imię:</label>
        <input type="text" name="imie" required><br>
        <label for="nazwisko">Nazwisko:</label>
        <input type="text" name="nazwisko" required><br>
        <input type="submit" name="submit" value="Zapisz">
    </form>';
} else {
    echo '
    <h1>Formularz zapisujący dane do pliku</h1>
    <form method="post" action="">
        <label for="imie">Imię:</label>
        <input type="text" name="imie" required><br>
        <label for="nazwisko">Nazwisko:</label>
        <input type="text" name="nazwisko" required><br>
        <input type="submit" name="submit" value="Zapisz">
    </form>';
}
?>
