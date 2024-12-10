<?php
    $conn = mysqli_connect("localhost","root","","5ti_g1_mecze2");
    if (!$conn) {
        die("Nieudane połączenie");
    }                                                        
?>
<!DOCTYPE html>                                                                                                                         
<html lang="en">
<head>
    <meta charset="UTF-8">                                              
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dif">
        <form action="#">
            <?php
                $sql = "SELECT druzyny.Id_druzyny, druzyny.Nazwa FROM druzyny;";
                $result = mysqli_query($conn,$sql);
                echo "<label>Druzyna: <select name=\"druzyna\">";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=\"".$row['Id_druzyny']."\">".$row['Nazwa']."</option>\n";
                }
                echo "</select></label>";
                echo "<input type=\"submit\" value=\"Wybierz\">";
            ?>
        </form>
    </div>
    <div class="dif">
        <?php
        if (isset($_GET['druzyna'])) {
            $druzyna = $_GET['druzyna'];
            $sql = "SELECT druzyny.Id_druzyny, druzyny.Nazwa, wyniki.Data_meczu, CONCAT(wyniki.Bramki_zdobyte,\":\",wyniki.Bramki_stracone) as wynik, wyniki.Nr_licencji, CONCAT(sedziowie.Imie,\" \",sedziowie.Nazwisko) as sedzia_nazwisko, wyniki.Rodzaj_meczu FROM druzyny JOIN wyniki USING(Id_druzyny) JOIN sedziowie USING(Nr_licencji) WHERE druzyny.Id_druzyny=$druzyna ORDER BY wyniki.Data_meczu DESC;";
            $result = mysqli_query($conn,$sql);
            echo "<table>";
            echo "<tr><th>Data</th><th>Wynik</th><th>Sędzia</th><th>Rodzaj meczu</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row['Data_meczu']."</td><td>".$row['wynik']."</td><td>".$row['sedzia_nazwisko']."</td><td>".$row['Rodzaj_meczu']."</td></tr>";
            }
            echo "</table>";
        }
        ?><br>
        <form action="dodaj_mecz.php">
            <input type="submit" value="Dodaj_mecz">
        </form>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>