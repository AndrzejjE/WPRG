<?php
echo "Podaj rozmiar pierwszej tablicy: ";
$n = fgets(STDIN);
echo "Podaj rozmiar drugiej tablicy: ";
$m = fgets(STDIN);

if ($n <= 0 || $m <= 0) {
    echo "BŁĄD: Rozmiar tablicy musi być większy od zera.\n";
    exit();
}

if ($n > $m) {
    echo "BŁĄD: Pierwsza tablica jest większa od drugiej.\n";
    exit();
}

if ($m > $n) {
    echo "BŁĄD: Druga tablica jest większa od pierwszej.\n";
    exit();
}

$tablica1 = [];
$tablica2 = [];

echo "Podaj elementy pierwszej tablicy:\n";
for ($i = 0; $i < $n; $i++) {
    $element = fgets(STDIN);
    array_push($tablica1, $element);
}

echo "Podaj elementy drugiej tablicy:\n";
for ($i = 0; $i < $m; $i++) {
    $element = fgets(STDIN);
    array_push($tablica2, $element);
}

$iloczyn_skalarny = 0;
for ($i = 0; $i < $n; $i++) {
    $iloczyn_skalarny += $tablica1[$i] * $tablica2[$i];
}

echo "Iloczyn skalarny wynosi: " . $iloczyn_skalarny . "\n";

?>
