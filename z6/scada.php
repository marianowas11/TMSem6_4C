<?php
    require("db.php");
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    if (!$polaczenie) {
        echo "Błąd połączenia z MySQL." . PHP_EOL;
        echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jackowski</title>
    <style>
        .container{
            display: flex;
            height: 800px;
        }
        .house{
            width: 400px;
            height: 500px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .house p{
            position: relative;
            display: block;
            font-size: 30px;
            z-index: 1;
            text-align: center;
            background: yellow;
            border: 1px solid black;
        }
        .house p:nth-child(2){
            top: 35px;
            left: 90px;
        }
        .house p:nth-child(3){
            top: -110px;
            left: 100px;
        }
        .house p:nth-child(4){
            top: 30px;
            left: 150px;
        }
        .house .plan{
            width: 400px;
            height: 400px;
            position: absolute;
        }
        .arrow{
            width: 100px;
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            font-size: 50px;
            font-weight: bold;
        }
        .arrow p{
            text-align: center;
        }
        .arrow p:nth-child(1){
            color: red;
        }
        .arrow p:nth-child(2){
            color: blue;
        }
        img.piec{
            width: 400px;
            max-height: 500px;
        }
        img.wykres{
            width: 550px;
            max-height: 500px;
        }
        .house .went{
            position: relative;
            width: 50px;
            height: 50px;
            top: -230px;
            left: -45px;
        }
        .house .went.anim1{
            animation: wentylacja 4s linear infinite;
        }
        .house .went.anim2{
            animation: wentylacja 2s linear infinite;
        }
        @keyframes wentylacja{
            0%{
                transform: rotate(0);
            }

            100%{
                transform: rotate(360deg);
            }
        }
        .house .pozar{
            position: relative;
            width: 50px;
            height: 50px;
            top: 37px;
            left: -10px;
        }
        .house .alarm{
            position: relative;
            width: 50px;
            height: 50px;
            top: 199px;
            left: -176px;
        }
        .house .wyciek{
            position: relative;
            width: 50px;
            height: 50px;
            top: -230px;
            left: -51px;
        }
        .house .wlamanie{
            position: relative;
            width: 50px;
            height: 50px;
            top: 200px;
            left: -158px;
        }
        .house .opa{
            opacity: 0.1;
        }
    </style>
</head>
<?php
    $rezultat = mysqli_query($polaczenie, "SELECT * FROM pomiary ORDER BY id DESC LIMIT 1");
    $wiersz = $rezultat->fetch_row();
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
?>
<body>
    <div class="container">
        <div class="house">
            <img src="plan.jpg" alt="plan" class="plan">
            <p id="x3">
                3
            </p>
            <p id="x4">
                4
            </p>
            <p id="x5">
                5
            </p>
            <img src="wentylacja.png" alt="went" id="went" class="went 
                <?php 
                    if($went == 1){ echo 'anim1';}
                    else if($went == 2){ echo 'anim2';}
                ?>
                ">
            <img src="fire.png" alt="pozar" id="pozar" class="pozar
                <?php
                    if(!$pozar) echo 'opa';
                ?>
            ">
            <img src="alarm.png" alt="aalarm" id="dostep" class="alarm
                <?php
                    if(!$dostep) echo 'opa';
                ?>
            ">
            <img src="wyciek.png" alt="wyciekalarm" id="gaz" class="wyciek
                <?php
                    if(!$gaz) echo 'opa';
                ?>
            ">
            <img src="zlodziej.png" alt="walarm" id="wlam" class="wlamanie
                <?php
                    if(!$wlam) echo 'opa';
                ?>
            ">
        </div>
        <div class="arrow">
            <p>&#8592; 
                <span id="x1">1</span>
            </p>
            <p>&#8594;
                <span id="x2">2</span>
            </p>
        </div>
        <img src="piec.png" alt="piec" class="piec">
        <span id="wyk"><img src="wykres.php" alt="wykres" class="wykres"></span>
    </div><br>

    <script>
        
        var evtSource = new EventSource('csv_from_db2.php');
        var went = document.getElementById("went");
        var pozar = document.getElementById("pozar");
        var gaz = document.getElementById("gaz");
        var dostep = document.getElementById("dostep");
        var wlam = document.getElementById("wlam");
        evtSource.onmessage = function(e){
            var data = e.data;
            data = data.split("\t");
            x1.innerHTML = data[0];
            x2.innerHTML = data[1];
            x3.innerHTML = data[2];
            x4.innerHTML = data[3];
            x5.innerHTML = data[4];
            if(data[5] == 1){
                went.classList.add("anim1");
                went.classList.remove("anim2");
            }
            else if(data[5] == 2){
                went.classList.add("anim2");
                went.classList.remove("anim1");
            }
            else{
                went.classList.remove("anim1");
                went.classList.remove("anim2");
            }
            if(data[6] == 1){
                pozar.classList.remove("opa");
            }
            else{
                pozar.classList.add("opa");
            }
            if(data[7] == 1){
                gaz.classList.remove("opa");
            }
            else{
                gaz.classList.add("opa");
            }
            if(data[8] == 1){
                dostep.classList.remove("opa");
            }
            else{
                dostep.classList.add("opa");
            }
            if(data[9] == 1){
                wlam.classList.remove("opa");
            }
            else{
                wlam.classList.add("opa");
            }
            
            wyk.innerHTML = "<img src='wykres.php' alt='wykres' class='wykres'>";
        };
        evtSource.onerror = function() {
            //evtSource.close();
            //console.log('Done!'); 
        };
    </script>

    
</body>
</html>

<?php
    mysqli_close($polaczenie);
?>