<html lang="pl">
<head>
    <title>Zad_1_7</title>
</head>
<body>
<form method="post">

    <label for="a">Podaj numer miesiąca:
        <input type="number" name="nr_m" required>
    </label><br>
    <input type="submit" name="submit" value="wynik">
</form>

<?php
if (isset($_POST['submit'])) {
    $nr_m = $_POST['nr_m'];
    if ($nr_m > 12 || $nr_m < 1) {
        echo "BłĄD: niepoprawny miesiąc";
    } else {
        switch ($nr_m) {
            case 1:
                echo "Styczeń ma 31 dni.";
                break;
            case 2:
                echo "Luty ma 28 dni.";
                break;
            case 3:
                echo "Marzec ma 31 dni.";
                break;
            case 4:
                echo "Kwiecień ma 30 dni.";
                break;
            case 5:
                echo "Maj ma 31 dni.";
                break;
            case 6:
                echo "Czerwiec ma 30 dni.";
                break;
            case 7:
                echo "Lipiec ma 31 dni.";
                break;
            case 8:
                echo "Sierpień ma 31 dni.";
                break;
            case 9:
                echo "Wrzesień ma 30 dni.";
                break;
            case 10:
                echo "Październik ma 31 dni.";
                break;
            case 11:
                echo "Listopad ma 30 dni";
                break;
            case 12:
                echo "Grudzień ma 31 dni";
                break;
        }
    }

}
?>

</body>
</html>

