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

    //while (!connection_aborted()){
        $rezultat = mysqli_query($polaczenie, "SELECT * FROM pomiary2 ORDER by id DESC Limit 1") or die ("SQL error 2: $dbname");
        while ($wiersz = mysqli_fetch_array ($rezultat))
        {
            $id = $wiersz[0];
            $x1 = $wiersz[1];
            $x2 = $wiersz[2];
            $x3 = $wiersz[3];
            $x4 = $wiersz[4];
            $x5 = $wiersz[5];
        }
        echo 'data:'.$x1."\t".$x2."\t".$x3."\t".$x4."\t".$x5."\n\n"; // sklejenie pliku CSV
        // flush the output buffer and send echoed messages to the browser
        //while (ob_get_level() > 0) {
            ob_end_flush();
        //}
        flush();
        sleep(1); // Sleep for 1 seconds
    //}
    
    mysqli_close($polaczenie);
?>
