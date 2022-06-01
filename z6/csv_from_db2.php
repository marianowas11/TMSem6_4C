<?php
require ('db.php');
$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    if (!$polaczenie) {
        echo "Błąd połączenia z MySQL." . PHP_EOL;
        echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
header("Content-Type: text/event-stream");
header('Cache-Control: no-cache');

$rezultat = mysqli_query($polaczenie, "SELECT * FROM pomiary ORDER by id DESC Limit 1") or die ("SQL error 2: $dbname");
while ($wiersz = mysqli_fetch_array ($rezultat))
{
    $id = $wiersz[0];
    $x1 = $wiersz[1];
    $x2 = $wiersz[2];
    $x3 = $wiersz[3];
    $x4 = $wiersz[4];
    $x5 = $wiersz[5];
    $went = $wiersz[7];
    $pozar = $wiersz[8];
    $gaz = $wiersz[9];
    $dostep = $wiersz[10];
    $wlam = $wiersz[11];
}
echo 'data:'.$x1."\t".$x2."\t".$x3."\t".$x4."\t".$x5."\t".$went."\t".$pozar."\t".$gaz."\t".$dostep."\t".$wlam."\n\n";
ob_end_flush();
flush();
sleep(1);

mysqli_close($polaczenie);
?>