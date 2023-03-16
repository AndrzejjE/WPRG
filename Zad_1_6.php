<?php
$a = readline("Podaj długość boku a: ");
$b = readline("Podaj długość boku b: ");
$c = readline("Podaj długość boku c: ");

if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
    echo "Można zbudować trójkąt.\n";
} else {
    echo "BŁĄD: Nie można zbudować trójkąta z podanych boków.\n";
}
?>
