<?php
    require ('db.php');
    require ('phplot.php');
    
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    if (!$polaczenie) {
        echo "Błąd połączenia z MySQL." . PHP_EOL;
        echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    $rezultat = mysqli_query($polaczenie, "SELECT * FROM pomiary");
    $id = 0;
    while ($wiersz = mysqli_fetch_array ($rezultat)){
        for($i = 1; $i <= 5; $i++){
            $x[$i][$id] = $wiersz[$i];
        }
        $id++;
    }

    $legend_text = array('x1', 'x2', 'x3', 'x4', 'x5');
    for($i = 0; $i < $id; $i++){
        for($j = 0; $j <= 5; $j++){
            if($j == 0){
                $data[$i][$j] = $j + 1;
            }
            else{
                $data[$i][$j] = $x[$j][$i];
            }
        }
    }

    $plot = new PHPlot(800, 600);

    $plot -> SetDataValues($data);
    $plot->SetLegend($legend_text);
    $plot -> SetDataType('text-data');
    $plot -> SetTitle('Wykres temperatur X1, X2, X3, X4, X5'); // opcjonalny tytuł wykresu
    $plot -> DrawGraph();


    mysqli_close($polaczenie);
    /*

    $rezultat = mysqli_query($polaczenie, "SELECT * FROM pomiary ORDER BY id DESC LIMIT 1");
    $wiersz = $rezultat->fetch_row();
    $id = $wiersz[0];
    $x1 = $wiersz[1];
    $x2 = $wiersz[2];
    $x3 = $wiersz[3];
    $x4 = $wiersz[4];
    $x5 = $wiersz[5];
    $datetime = $wiersz[6];

    $plot = new PHPlot(800, 600);
    $data = array(array('14:30',0,$x1), array('14:35',1,$x2), array('14:40',2,$x3), array('14:45',3,$x4), array('14:50',4,$x5));
    $plot -> SetDataValues($data);
    $plot -> SetDataType('data-data');
    $plot -> SetTitle('Przyklad wykresu liniowego'); // opcjonalny tytuł wykresu
    $plot -> DrawGraph();


    mysqli_close($polaczenie);*/

?>