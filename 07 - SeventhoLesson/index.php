<?php
        $conn = mysqli_connect("localhost", "root", "", "5ti_g1_domy");
        if (!$conn) {
            die ("Połączenie nieudane ".mysqli_connect_error());
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
        <select>
            <?php
                
            ?>
        </select>
        <input type="submit" value="Pokaż">
        </form>
    </div>
    <?php
    // $sql = "SELECT imie, nazwisko, `status`, SUM(cena) FROM oferty JOIN agenci USING(Id_agenta) WHERE `status` = "S" GROUP BY Id_agenta;";
    ?>
</body>
</html>