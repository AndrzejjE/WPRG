<!DOCTYPE html>
<html>
<head>
    <title>Formularz rezerwacji</title>
</head>
<body>
<h1>Formularz rezerwacji</h1>
<form method="POST">
    <label for="numbers">*Liczba osób (1-10):</label>
    <input type="number" name="numbers"><br>
    <label for="name">*Imię:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="surname">*Nazwisko:</label>
    <input type="text" id="surname" name="surname" required><br><br>
    <label for="address">*Adres:</label>
    <input type="text" id="address" name="address" required><br><br>
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
    <input type="submit" value="Wyślij">
</form>
<a href="rezerwacje.csv" download>Pobierz rezerwacje</a>

<form method="POST">
    <input type="hidden" name="wczytaj" value="1">
    <input type="submit" value="Wczytaj">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['wczytaj'])) {
    $file = fopen('rezerwacje.csv', 'a');
    $numbers = $_POST['numbers'];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $address = $_POST["address"];
    $bNum = $_POST["bNum"];
    $email = $_POST["email"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $childBed = isset($_POST["childBed"]) ? "Tak" : "Nie";
    $amenities = implode(", ", $_POST["amenities"]);

    if ($file === false) {
        die('Nie udało się otworzyć pliku');
    }
    if (filesize('rezerwacje.csv') == 0) {
        fputcsv($file, array('Liczba osób', 'Imię', 'Nazwisko', 'Address', 'Numer karty kredytowej', 'Email', 'Data pobytu', 'Godzina przyjazdu,',
            'Dostawka dla dzieci', 'Udogodnienia'), ';');
    }

    fputcsv($file, array($numbers, $name, $surname, $address, $bNum, $email, $date, $time, $childBed, $amenities), ';');

    fclose($file);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wczytaj'])) {
    $file = fopen('rezerwacje.csv', 'r');

    if ($file === false) {
        die('Nie udało się otworzyć pliku');
    }

    echo '<table>';

    while (($data = fgetcsv($file, 0, ';')) !== false) {
        echo '<tr>';
        foreach ($data as $cell) {
            echo '<td>' . htmlspecialchars($cell) . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';

    fclose($file);
}
?>
</body>
</html>
