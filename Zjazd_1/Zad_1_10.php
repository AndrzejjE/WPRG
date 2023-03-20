<?php

$number = null;


while (!is_numeric($number) || $number < 1) {
    echo "Podaj liczbę naturalną większą od 0: ";
    $number = fgets(STDIN);
}

for ($i = 1; $i <= $number; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}

for ($i = $number; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}


for ($i = 1; $i <= $number; $i++) {
    for ($j = 2; $j <= $i; $j++) {
        echo " ";
    }
    for ($j = $i; $j <= $number; $j++) {
        echo "*";
    }
    echo "\n";
}

for ($i = 1; $i <= $number; $i++) {
    for ($j = 1; $j <= ($number - $i); $j++) {
        echo " ";
    }
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}
?>
