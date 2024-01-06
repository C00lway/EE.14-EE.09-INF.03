<!DOCTYPE html>
<html lang="PL-pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styl4.css" />
    <title>Panel administratora</title>
  </head>
  <body>
    <div class="baner">
      <h3>Portal Społecznościowy-panel administratora</h3>
      </div>

    <main>
      <div class="lewy">
        <h4>Użytkownicy</h4>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "dane4");
        $sql = "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30;";
        $res = mysqli_query($conn, $sql);
      
        
        while($row=mysqli_fetch_row($res)){
          $data= date("Y");
          $rok= $row[3];
          $wiek= $data - $rok;
          echo "$row[0] $row[1] $row[2], $wiek lat </br>";
        }
     
        
        ?>
        <a href="settings.html">Inne ustawienia</a>
      </div>
      <div class="prawy">
        <h4>Podaj id użytkownika</h4>
        <form method="POST" action="users.php">
        <input type="number" name="id">
        <input class="guzik" type="submit" value="ZOBACZ">
        </form>
        <hr></hr>

        <?php
       
        if(isset($_POST['id'])){
$idd = $_POST['id'];
$zap = "SELECT imie, nazwisko, rok_urodzenia, opis, zdjecie, nazwa FROM osoby JOIN hobby ON osoby.Hobby_id=hobby.id WHERE osoby.id= $idd;";
$res2 = mysqli_query($conn, $zap);
while($row2 = mysqli_fetch_row($res2)){
  echo "<h2>$idd. $row2[0] $row2[1], </h2>  <img src='$row2[4]' alt='$idd'> <p>Rok urodzenia: $row2[2]</p><p>Opis: $row2[3]</p><p>Hobby: $row2[5]</p>";

        }
      }
mysqli_close($conn);
        ?>
      </div>

    </main>
    <div class="stopka">
      <span>
        Stronę Wykonał:0000000
      </span>
      </div>
  </body>
</html>
 