<?php
    require_once 'db.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jackowski z4</title>
    <style>
      table{
        border: 1px solid black;
      }
      td{
         border: 1px solid black;
      }
    </style>
    <meta name="description" content="">
  </head>
  <body>
      
        <?php
            $rezultat = mysqli_query($polaczenie, "SELECT * FROM pomiary");
            print "<table>";
            print "<tr><td>id</td><td>x1</td><td>x2</td><td>x3</td><td>x4</td><td>x5</td><td>Data/Godzina</td></tr>\n";
            while ($wiersz = mysqli_fetch_array ($rezultat))
            {
                $id = $wiersz[0];
                $x1 = $wiersz[1];
                $x2 = $wiersz[2];
                $x3 = $wiersz[3];
                $x4 = $wiersz[4];
                $x5 = $wiersz[5];
                $datetime = $wiersz[6];
                print "<tr><td>$id</td><td>$x1</td><td>$x2</td><td>$x3</td><td>$x4</td><td>$x5</td><td>$datetime</td></tr>\n";
            }
            print "</table>";
            mysqli_close($polaczenie);
        ?>
      
  </body>
</html>
