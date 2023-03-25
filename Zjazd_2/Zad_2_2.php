<html lang="pl">
<head>
    <title>Zad_2_2</title>
</head>
<body>
<h1>Rezerwacja hotelu</h1>

<form method="post">
    <label for="goscie">*Liczba osób (1-10):</label>
    <select id="numbers" required>
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
    <br><br>
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
    <input type="submit" name="submit" value="Zarezerwuj">

</form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
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

?>

<h2>Podsumowanie rezerwacji</h2>
<p>Liczba osób: <?php echo $numbers; ?></p>
<p>Imię: <?php echo $name; ?></p>
<p>Nazwisko: <?php echo $surname; ?></p>
<p>Adres: <?php echo $address; ?></p>
<p>Numer karty kredytowej: <?php echo $bNum; ?></p>
<p>Adres e-mail: <?php echo $email; ?></p>
<p>Data pobytu: <?php echo $date; ?></p>
<p>Godzina przyjazdu: <?php echo $time; ?></p>
<p>Dostawka dla dziecka: <?php echo $childBed; ?></p>
<p>Udogodnienia: <?php echo $amenities; ?></p>
<?php
}
?>
</body>
</html>
