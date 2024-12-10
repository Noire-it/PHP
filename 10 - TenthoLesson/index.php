<?php
$conn = mysqli_connect("localhost","root","","5ti_g1_konta");
if (!$conn) {
    die("Połączenie nieudane".mysqli_connect_error());
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
        <form action="">
            <select name="nazwisko">
                <option value="%">Wszyscy</option>
                <?php
                $sql = "SELECT CONCAT(osoby.imie,' ',osoby.nazwisko) AS osoba, osoby.id_osoby FROM osoby;";
                $result = mysqli_query($conn,$sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='".$row['id_osoby']."'>".$row['osoba']."</option>";
                }
                ?>
            </select>
            <input type="submit" value="Wybierz">
        </form>
        <form action="indexowanie.php">
            <input type="submit" value="Dodaj konto">
        </form>
    </div><br>
    <div class="dif">
        <?php
            if(isset($_GET['nazwisko'])) {
                $nazwisko = $_GET['nazwisko'];

                $sql = "SELECT konta.bank, konta.nr_konta, CONCAT(osoby.imie,' ',osoby.nazwisko) AS osoba, konta.dostepne_srodki FROM konta JOIN osoby USING(id_osoby) WHERE osoby.id_osoby LIKE '$nazwisko';";
                $result = mysqli_query($conn,$sql);

                echo "<table>";
                echo "<tr>";
                echo "<th>Bank</th>";
                echo "<th>Nr Konta</th>";
                echo "<th>Właściciel</th>";
                echo "<th>Stan konta</th>";
                echo "</tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>".$row['bank']."</td><td>".$row['nr_konta']."</td><td>".$row['osoba']."</td><td>".$row['dostepne_srodki']."</td></tr>";
                }

                echo "</table>";
            }
        ?>
    </div>
    <?php
        mysqli_close($conn);
    ?>
</body>
</html>