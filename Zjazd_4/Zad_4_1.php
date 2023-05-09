<?php
session_start();

$testLogin = "l";
$testPassword = "p";

if (isset($_POST['submit_login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login === $testLogin && $password === $testPassword) {
        $_SESSION['isUserLoggedIn'] = true;
        setcookie("login", $login, time() + (60 * 60 * 24), "/");
    } else {
        echo '<p>Błędne dane logowania. Spróbuj ponownie.</p>';
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
<html lang="pl">
<head>
    <title>Zad_4_1</title>
</head>
<body>
<?php if (!isset($_SESSION['isUserLoggedIn'])) : ?>
    <h1>Logowanie</h1>
    <form method="post">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br><br>
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="submit_login" value="Zaloguj">
    </form>
<?php endif; ?>

<?php if (isset($_SESSION['isUserLoggedIn'])) : ?>
<?php if (isset($_COOKIE['login'])) : ?>
    <p>Witaj, <?php echo $_COOKIE['login']; ?>!</p>
<?php endif; ?>

<h1>Rezerwacja hotelu</h1>

<form method="post">
    <label for="numbers">*Liczba osób:</label>
    <label>
        <input type="number" name="numbers" value="<?php echo $_COOKIE["numbers"] ?? ''; ?>">
    </label>
    <br><br>
    <label for="name">*Imię:</label>
    <input type="text" id="name" name="name" value="<?php echo $_COOKIE["name"] ?? ''; ?>" required><br><br>
    <label for="surname">*Nazwisko:</label>
    <input type="text" id="surname" name="surname" value="<?php echo $_COOKIE["surname"] ?? ''; ?>" required><br><br>
    <label for="address">*Adres:</label>
    <input type="text" id="address" name="address" value="<?php echo $_COOKIE["address"] ?? ''; ?>" required><br><br>
    <label for="bNnum">*Numer karty kredytowej:</label>
    <input type="text" id="bNum" name="bNum" pattern="[0-9]{13,16}" value="<?php echo $_COOKIE["bNum"] ?? ''; ?>" required><br><br>
    <label for="email">*Adres e-mail:</label>
    <input type="email" id="email" name="email" value="<?php echo $_COOKIE["email"] ?? ''; ?>" required><br><br>
    <label for="date">*Data pobytu:</label>
    <input type="date" id="date" name="date" value="<?php echo $_COOKIE["date"] ?? ''; ?>" required><br><br>
    <label for="time">*Godzina przyjazdu:</label>
    <input type="time" id="time" name="time" value="<?php echo $_COOKIE["time"] ?? ''; ?>" required><br><br>
    <label for="childBed">Dostawka dla dziecka:</label>
    <input type="checkbox" id="childBed" name="childBed" <?php if (isset($_COOKIE['childBed']) && $_COOKIE['childBed'] == 'Tak') echo 'checked'; ?>><br><br>
    <label for="">Udogodnienia:</label>
    <select id="amenities" name="amenities[]" multiple>
        <option value="klimatyzacja" >Klimatyzacja</option>
        <option value="popielniczka">Popielniczka dla palacza</option>
        <option value="sejf">Sejf</option>
        <option value="alkohol">Alkohol</option>
    </select><br><br>

    <button type="submit" name="submit" value="Zarezerwuj">Zarezerwuj</button>
    <button type="submit" name="clear_cookies" value="Wyczyść formularz" formnovalidate>Wyczyść formularz</button>
    <br>

    <?php
    if (isset($_POST["clear_cookies"])) {
        setcookie("numbers", "", time() - (60 * 60 * 24 * 30), "/");
        setcookie("name", "", time() - (60 * 60 * 24 * 30), "/");
        setcookie("surname", "", time() - (60 * 60 * 24 * 30), "/");
        setcookie("address", "", time() - (60 * 60 * 24 * 30), "/");
        setcookie("bNum", "", time() - (60 * 60 * 24 * 30), "/");
        setcookie("email", "", time() - (60 * 60 * 24 * 30), "/");
        setcookie("date", "", time() - (60 * 60 * 24 * 30), "/");
        setcookie("time", "", time() - (60 * 60 * 24 * 30), "/");
        setcookie("childBed", "", time() - (60 * 60 * 24 * 30), "/");

    }

    ?>
</form>
    <form method="post">
        <input type="submit" name="logout" value="Wyloguj">
    </form>
<?php else : ?>
    <p>Nie masz dostępu do tej części strony. Musisz się zalogować, aby móc rezerwować hotel.</p>
<?php endif; ?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
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

    setcookie("numbers", $numbers, time() + (60 * 60 * 24 * 30), "/");
    setcookie("name", $name, time() + (60 * 60 * 24 * 30), "/");
    setcookie("surname", $surname, time() + (60 * 60 * 24 * 30), "/");
    setcookie("address", $address, time() + (60 * 60 * 24 * 30), "/");
    setcookie("bNum", $bNum, time() + (60 * 60 * 24 * 30), "/");
    setcookie("email", $email, time() + (60 * 60 * 24 * 30), "/");
    setcookie("date", $date, time() + (60 * 60 * 24 * 30), "/");
    setcookie("time", $time, time() + (60 * 60 * 24 * 30), "/");
    setcookie("childBed", $childBed, time() + (60 * 60 * 24 * 30), "/");

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
