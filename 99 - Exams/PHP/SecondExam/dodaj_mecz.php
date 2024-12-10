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
</body>
</html>