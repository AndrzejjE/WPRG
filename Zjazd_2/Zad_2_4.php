<!DOCTYPE html>
<html>
<head>
    <title>Zad_2_4</title>
</head>
<body>
<form method="post" action="">
    Wpisz liczbę: <input type="number" name="number" required>
    <input type="submit" value="Sprawdź">
</form>

<?php
if(isset($_POST['number'])){
    $number = intval($_POST['number']);
    if($number <= 0){
        echo "Podaj dodatnią liczbę całkowitą.";
    } else if(isPrimeNum($number)){
        echo "Liczba ".$number." jest liczbą pierwszą.";
    } else {
        echo "Liczba ".$number." nie jest liczbą pierwszą.";
    }
}

function isPrimeNum($number){
    $iterations = 0;
    if($number == 1) return false;
    if($number == 2){ echo "Liczba iteracji: 1. "; return true;}
    if($number % 2 == 0) return false;

    for($i = 3; $i <= ceil(sqrt($number)); $i+=2){
        $iterations++;
        if($number % $i == 0){
            return false;
        }
    }
    echo "Liczba iteracji: ".$iterations . " ";
    return true;
}
?>
</body>
</html>
