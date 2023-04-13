<html lang="pl">
<head>
    <title>Zad_2_3</title>
</head>
<body>
<h1>Rezerwacja hotelu</h1>

<form method="post">
    <label for="goscie">*Liczba osób (1-10):</label>
    <select id="numbers" name="numbers" required>
        <option value="">Wybierz numer</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>
    <input type="submit" name="submit" value="Zarezerwuj">
    <br><br>
<form method="post">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $numbers = $_POST['numbers'];
        for ($i = 1; $i <= $numbers; $i++) {
            ?>
            <h3>Osoba <?php echo $i; ?></h3>
            <label for="name<?php echo $i; ?>">*Imię:</label>
            <input type="text" id="name<?php echo $i; ?>" name="name[]" required><br><br>
            <label for="surname<?php echo $i; ?>">*Nazwisko:</label>
            <input type="text" id="surname<?php echo $i; ?>" name="surname[]" required><br><br>
            <label for="address<?php echo $i; ?>">*Adres:</label>
            <input type="text" id="address<?php echo $i; ?>" name="address[]" required><br><br>
            <?php
        }
    }
    ?>



    <label for="bNnum">*Numer karty kredytowej:</label>
    <input type="text" id="bNum" name="bNum" pattern="[0-9]{13,16}" required><br><br>
    <label for="email">*Adres e-mail:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="date">*Data pobytu:</label>
    <input type="date" id="date" name="date" required><br><br>
    <label for="time">*Godzina przyjazdu:</label>
    <input type="time" id="time" name="time" required><br><br>
    <label for="childBed">Dostawka dla dziecka:</label>
    <input type="checkbox" id="childBed" name="childBed"><br><br>
    <label for="">Udogodnienia:</label>
    <select id="amenities" name="amenities[]" multiple>
        <option value="klimatyzacja">Klimatyzacja</option>
        <option value="popielniczka">Popielniczka dla palacza</option>
        <option value="sejf">Sejf</option>
        <option value="alkohol">Alkohol</option>
    </select><br><br>
    <input type="submit" name="submit" value="Zarezerwuj">

</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numbers = $_POST['numbers'];
    $names = $_POST['name'];
    $surnames = $_POST['surname'];
    $addresses = $_POST['address'];
    $bNum = $_POST['bNum'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $childBed = isset($_POST['childBed']) ? 'Tak' : 'Nie';
    $amenities = isset($_POST['amenities']) ? implode(', ', $_POST['amenities']) : 'Brak';

    echo '<h2>Informacje o gościach:</h2>';
    echo '<table>';
    echo '<tr><th>Lp.</th><th>Imię</th><th>Nazwisko</th><th>Adres</th></tr>';
    for ($i = 0; $i < $numbers; $i++) {
        $lp = $i + 1;
        echo "<tr><td>$lp</td><td>$names[$i]</td><td>$surnames[$i]</td><td>$addresses[$i]</td></tr>";
    }
    echo '</table>';

    echo '<h2>Podsumowanie rezerwacji:</h2>';
    echo "<p>Numer karty kredytowej: $bNum</p>";
    echo "<p>Adres e-mail: $email</p>";
    echo "<p>Data pobytu: $date</p>";
    echo "<p>Godzina przyjazdu: $time</p>";
    echo "<p>Dostawka dla dziecka: $childBed</p>";
    echo "<p>Udogodnienia: $amenities</p>";
}
?>

</body>
</html>
