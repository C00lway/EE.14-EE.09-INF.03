<!DOCTYPE html>
<html lang="PL-pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css" />
  </head>

  <body>
    <div class="baner"><h3>Ryby zamieszkujące rzeki</h3></div>
    <div class="srodek">
      <div class="lewe">
        <div class="lewy1">
          <h3>Ryby zamieszkujące rzeki</h3>
          <ol>
            <?php
$conn=mysqli_connect("localhost","root","","wedkowanie");
$sql = "SELECT nazwa, akwen, wojewodztwo FROM ryby JOIN lowisko ON
ryby.id = lowisko.Ryby_id WHERE rodzaj=3;";
$res=mysqli_query($conn, $sql);
while($row=mysqli_fetch_row($res)){
    echo "<li>$row[0] pływa w rzece $row[1], $row[2]</li>";
}

            ?>
          </ol>
        </div>
        <div class="lewy2">
          <h3>Ryby drapieżne naaszych wód</h3>
          <table>
            <tr>
              <th>L.p.</th>
              <th>Gatunek</th>
              <th>Występowanie</th>
            </tr>
            <?php
            $zap="SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia like 1;";
            $res2=mysqli_query($conn,$zap);
            while($row2=mysqli_fetch_row($res2)){
                echo"<tr>
                <td>$row2[0]</td>
                <td>$row2[1]</td>
                <td>$row2[2]</td>
                </tr>";
            }
            mysqli_close($conn);

            ?>
          </table>
        </div>
      </div>
      <div class="prawy">
        <img src="ryba1.jpg" alt="Sum" />
        <a href="kw.txt">Pobierz kwerendy</a>
      </div>
    </div>
    <div class="stopka">
      <p>Stronę wykonał:00000000</p>
    </div>
  </body>
</html>
