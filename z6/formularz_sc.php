<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jackowski z4</title>
    <meta name="description" content="">
  </head>
  <body>
    <form method="POST" action="add.php"><br>
        x1:<input type="number" name="x1" min="-50" max="100" step="0.1" required><br>
        x2:<input type="number" name="x2" min="-50" max="100" step="0.1" required><br>
        x3:<input type="number" name="x3" min="-50" max="100" step="0.1" required><br>
        x4:<input type="number" name="x4" min="-50" max="100" step="0.1" required><br>
        x5:<input type="number" name="x5" min="-50" max="100" step="0.1" required><br>
        Wentylacja: 
        <select name="went">
          <option value="0">Wyłączona</option>
          <option value="1">Poziom 1</option>
          <option value="2">Poziom 2</option>
        </select><br>
        Pożar:
        <select name="pozar">
          <option value="1">Tak</option>
          <option value="0">Nie</option>
        </select><br>
        Wyciek gazu:
        <select name="gaz">
          <option value="true">Tak</option>
          <option value="false">Nie</option>
        </select><br>
        Alarm dostępu:
        <select name="dostep">
          <option value="true">Tak</option>
          <option value="false">Nie</option>
        </select><br>
        Alarm włamaniowy:
        <select name="wlam">
          <option value="true">Tak</option>
          <option value="false">Nie</option>
        </select><br>
        <input type="submit" value="Send"/>
    </form>
  </body>
</html>
