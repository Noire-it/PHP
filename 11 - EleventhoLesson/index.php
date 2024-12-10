<?php
$conn = mysqli_connect("localhost","root","","5ti_g1_konta");
if (!$conn) {
    die ("Nieudane połączenie ig...".mysqli_connect_error());
}

$sql = "UPDATE test SET test.srodki = srodki+".$_GET['piniondz'].";";
mysqli_query($conn,$sql);
die();
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
            <select name="kebabNazwisko">
                <?php
                $sql = "SELECT CONCAT(test.imie,' ',test.nazwisko) as fullNazwisko FROM test;";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option>".$row['fullNazwisko']."</option>";
                }
                ?>
            </select>
            <input type="number" name="piniondz">
            <input type="submit" value="Dodaj">
        </form>
        <?php
        if (isset($_GET['kebabNazwisko'])) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Imie</th>";
            echo "<th>Nazwisko</th>";
            echo "<th>Balans?</th>";
            echo "</tr>";

            $sql = "SELECT * FROM `test`";
            $result = mysqli_query($conn,$sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['srodki']."</td></tr>";
            }

           echo "</table>"; 
        }
        ?>
    </div>
</body>
<?php
mysqli_close($conn);
?>
</html>