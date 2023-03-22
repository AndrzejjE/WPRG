<?php

function isPangram($text) {
    $alphabet = range('a', 'z');
    $text = strtolower($text);
    foreach ($alphabet as $letter) {
        if (strpos($text, $letter) === false) {
            return false;
        }
    }
    return true;
}

echo "Wprowadź tekst do sprawdzenia, czy jest pangramem: ";
$text = fgets(STDIN);
if (isPangram($text)) {
    echo "Tekst jest pangramem.";
} else {
    echo "Tekst nie jest pangramem.";
}

?>
