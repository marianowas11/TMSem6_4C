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
    <!--<div class=myDiv id='x0'></div> <br />-->
    <div class=myDiv id='x1'></div> <br />
    <div class=myDiv id='x2'></div> <br />
    <div class=myDiv id='x3'></div> <br />
    <div class=myDiv id='x4'></div> <br />
    <div class=myDiv id='x5'></div> <br />


    <script>
        var evtSource = new EventSource('xml_from_db.php');
        evtSource.onmessage = function(e){

            //x0.innerHTML = e.data;
            //x1.innerHTML = xmlDoc.getElementsByTagName("x1")[0].childNodes[0].nodeValue;
            //x2.innerHTML = xmlDoc.getElementsByTagName("x2")[0].childNodes[0].nodeValue;
            //x3.innerHTML = xmlDoc.getElementsByTagName("x3")[0].childNodes[0].nodeValue;
            //x4.innerHTML = xmlDoc.getElementsByTagName("x4")[0].childNodes[0].nodeValue;
            //x5.innerHTML = xmlDoc.getElementsByTagName("x5")[0].childNodes[0].nodeValue;

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.open("GET", "data.xml", false);
            xmlhttp.send();
            xmlDoc = xmlhttp.responseXML;

            //x0.innerHTML = xmlDoc.getElementsByTagName("val")[0].innerHTML;
            x1.innerHTML = xmlDoc.getElementsByTagName("x1")[0].innerHTML;
            x2.innerHTML = xmlDoc.getElementsByTagName("x2")[0].innerHTML;
            x3.innerHTML = xmlDoc.getElementsByTagName("x3")[0].innerHTML;
            x4.innerHTML = xmlDoc.getElementsByTagName("x4")[0].innerHTML;
            x5.innerHTML = xmlDoc.getElementsByTagName("x5")[0].innerHTML;
   


        };
        evtSource.onerror = function() {
            //evtSource.close();
            //console.log('Done!'); 
        };
    </script>
</body>
</html>