<?php
    require ('db.php');
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    if (!$polaczenie) {
        echo "Błąd połączenia z MySQL." . PHP_EOL;
        echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    $x1 = $_POST['x1'];
    $x2 = $_POST['x2'];
    $x3 = $_POST['x3'];
    $x4 = $_POST['x4'];
    $x5 = $_POST['x5'];


    if($x1 >= -50 && $x1 <= 100 && is_numeric($x1)
        && $x2 >= -50 && $x2 <= 100 && is_numeric($x2)
        && $x3 >= -50 && $x3 <= 100 && is_numeric($x3)
        && $x4 >= -50 && $x4 <= 100 && is_numeric($x4)
        && $x5 >= -50 && $x5 <= 100 && is_numeric($x5)){

        $result = mysqli_query($polaczenie, "INSERT INTO pomiary2 (x1,x2,x3,x4,x5) VALUES ($x1,$x2,$x3,$x4,$x5)");
        mysqli_close($polaczenie);
        header('Location: index.php');

    }
    else{
        echo "zle";
    }

?>