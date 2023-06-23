<?php
require_once 'functions.php';
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

$output = fopen('php://output', 'w');

fputcsv($output, array('Firstname', 'Lastname', 'Matches Won', 'Sets Won'));

$conn = connectToDatabase();
$rows = mysqli_query($conn, 'SELECT firstname, lastname, matches_won, sets_won FROM Players');

while ($row = mysqli_fetch_assoc($rows)) {
    fputcsv($output, $row);
}
?>
