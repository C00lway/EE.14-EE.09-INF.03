<!DOCTYPE html>
<html lang="PL-pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Odloty samolotów</title>
    <link rel="stylesheet" href="styl6.css" />
  </head>
  <body>
    <div class="baner">
      <div class="banerlewo">
        <h2>Odloty z lotniska</h2>
      </div>
      <div class="banerprawo">
        <img src="zad6.png" alt="logotyp" />
      </div>
    </div>
    <div class="glowny">
      <h4>tabela odlotow</h4>
      <table>
        <tr>
          <th>lp.</th>
          <th>numer rejsu</th>
          <th>czas</th>
          <th>kierunek</th>
          <th>status</th>
        </tr>
        <?php
        $conn=mysqli_connect('localhost', 'root','','egzamin');
        $sql= "SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas DESC;";
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_row($res)) {
           echo "<tr>
           <td>$row[0]</td>
           <td>$row[1]</td>
           <td>$row[2]</td>
           <td>$row[3]</td>
           <td>$row[4]</td>
           </tr>";
        }
        mysqli_close($conn);
       ?>
      </table>
    </div>
    <div class="stopa">
      <div class="stopajeden">
        <a href="kw1.jpg" target="_blank">pobierz obraz</a>
      </div>
      <div class="stopadwa">

      <?php
		if (!isset($_COOKIE["ciastko"])) {
            setcookie("ciastko",1,time()+3600);
            echo "<p><b>Sprawdź regulamin naszej strony!</b></p>";
        }
        else {
            echo "<p><b>Miło nam, że nas znowu odwiedziłeś</b></p>";
        }
        
      ?>
      </div>
      <div class="stopatrzy">
        <span>Autor:0000000</span>
      </div>
    </div>
  </body>
</html>
