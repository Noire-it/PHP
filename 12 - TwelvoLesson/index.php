<?php
$conn = mysqli_connect("localhost","root","","5ti_g1_konta");
if (!$conn) {
    die("Nieudane połączenie".mysqli_connect_error());
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
        <?php
        $sql = "SELECT * FROM test";
        $result = mysqli_query($conn,$sql);
        echo "<table>";
        echo "<tr><th>Imię</th><th>Nazwisko</th><th>Środki</th><th></th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['srodki']."</td><td>";
            echo "<form>";
            echo "<input type=\"hidden\" name=\"klient\" value=\"".$row['ID']."\">";
            echo "<input type=\"submit\" value=\"+\" name=\"dodaj\">";
            echo "</form></td></tr>";
        }
        echo "<table>";
        
        if (isset($_GET['dodaj'])) {
            $qwota = 50;
            $sql = "UPDATE test SET srodki = srodki + $qwota WHERE ID=$klient";
            mysqli_query($conn,$sql);
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>