<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title>Jackowski</title>
    <meta name="description" content="">
    <style>
        .myDiv { border: 1px outset red; }
    </style>
  </head>
  <body>
    <div class=myDiv id='x0'></div> <br />
    <div class=myDiv id='x1'></div> <br />
    <div class=myDiv id='x2'></div> <br />
    <div class=myDiv id='x3'></div> <br />
    <div class=myDiv id='x4'></div> <br />
    <div class=myDiv id='x5'></div> <br />


    <script>
        
        var evtSource = new EventSource('json_from_db.php');
        evtSource.onmessage = function(e){
            let jdata = JSON.parse(e.data);

            x0.innerHTML = e.data;
            x1.innerHTML = jdata['x1'];
            x2.innerHTML = jdata['x2'];
            x3.innerHTML = jdata['x3'];
            x4.innerHTML = jdata['x4'];
            x5.innerHTML = jdata['x5'];
        };
        evtSource.onerror = function() {
            //evtSource.close();
            //console.log('Done!'); 
        };
    </script>
</body>
</html>