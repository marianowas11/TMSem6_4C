<?php
    require_once 'db.php';
    require_once 'phplot.php';


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
    $plot -> SetTitle('Wykres temperatur X1 - X5'); // opcjonalny tytuł wykresu
    $plot -> DrawGraph();


    mysqli_close($polaczenie);

?>