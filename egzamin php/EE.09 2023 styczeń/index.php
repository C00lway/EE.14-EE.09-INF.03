<!DOCTYPE html>
<html lang="PL-pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sekretariat</title>
    <link rel="stylesheet" href="styl.css" />
  </head>
  <body>
    <div class="bloki">
        <div class="lewy">
            <h1>Akta Pracownicze</h1>
        <?php
$conn=mysqli_connect("localhost","root","","firma");
$sql="SELECT imie, nazwisko, adres, miasto, czyRODO, czyBadania FROM pracownicy WHERE id=2;";
        $res=mysqli_query($conn, $sql);
        while($row=mysqli_fetch_row($res)){
            echo"<h3>dane</h3><p>$row[0] $row[1]</p><hr></hr><h3>adres</h3><p>$row[2]</p><p>$row[3]</p><hr></hr>";
            if($row[4]==1){
            echo "<p>RODO: podpisano</p>";
            }
            else{
            echo "<p>RODO: niepodpisano</p>";
            }
            if($row[5]==1){
                echo "<p>Badania: aktualne</p>";
            }
                else{
                echo "<p>badania: nieaktualne</p>";
                }

        }
       
        ?>
        <hr></hr>
        <h3>Dokumenty pracownika</h3>
        <a href="cv.txt">Pobierz</a>
        <h1>Liczba zatrudnionych pracowników</h1>
    <p>        <?php
$sql2="SELECT COUNT(*) FROM `pracownicy` ;";
$res2=mysqli_query($conn, $sql2);
while($row2=mysqli_fetch_row($res2)){
echo"$row2[0]";
}
?>
</p>
        </div>
    <div class="prawy">
        <?php
$sql3="SELECT id, imie, nazwisko FROM pracownicy WHERE id = 2;";
$sql4="SELECT pracownicy.id, nazwa, opis FROM pracownicy JOIN stanowiska
ON stanowiska.id=pracownicy.stanowiska_id WHERE pracownicy.id=2;";
$res4=mysqli_query($conn, $sql4,);
$res3=mysqli_query($conn, $sql3,);
while($row3=mysqli_fetch_row($res3)){
    $row4=mysqli_fetch_row($res4);
echo"<img src='$row3[0].jpg' alt='pracownik'>
<h2>$row3[1] $row3[2]</h2>
<h4>$row4[1]</h4>
<h5>$row4[2]</h5>
";
}
mysqli_close($conn);
        ?>
    </div>
</div>
    <div class="stopka">
        <span>Autorem aplikacji jest:00000000</span>
        <ul>
            <li>skontaktuj się</li>
            <li>poznaj naszą firmę</li>
        </ul>
    </div>
  </body>
</html>
