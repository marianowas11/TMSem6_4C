<?php
        require('db.php');
        $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
        if (!$polaczenie) {
            echo "SQL Error 1." . PHP_EOL;
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
    }
    $data = Array("x1" => $x1, "x2" => $x2, "x3" => $x3, "x4" => $x4, "x5" => $x5);
    $str = json_encode($data);

    echo "data: {$str}\n\n";
    
    //while (ob_get_level() > 0) {
        ob_end_flush();
    //}
    flush();
    sleep(1);
    
    mysqli_close($polaczenie);
?>