<?php

echo "Podaj ilość wierszy i kolumn oddzielając je spacją: ";
$wymiary = explode(" ", trim(fgets(STDIN)));
$wiersze = $wymiary[0];
$kolumny = $wymiary[1];


$tablica = array();


for ($i = 0; $i < $wiersze; $i++) {
    $a = explode(" ", trim(fgets(STDIN)));
    if (count($a) != $kolumny || array_filter($a, 'is_numeric') !== $a) {
        echo "BŁĄD";
        exit();
    }
    for ($j = 0; $j < $kolumny; $j++) {
        $tablica[$i][$j] = $a[$j];
    }
}


for ($j = 0; $j < $kolumny; $j++) {
    for ($i = 0; $i < $wiersze; $i++) {
        echo $tablica[$i][$j] . " ";
    }
    echo "\n";
}

?>
