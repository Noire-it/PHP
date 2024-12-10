<?php
    $conn = mysqli_connect("localhost","root","","5ti_g1_nieruchomosci");
    if (!$conn) {
        die("Nieudane połączenie...".mysqli_connect_error());
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
            <label>Wybierz agenta: <select name="agent">
                <?php
                $sql = "SELECT agenci.Id_agenta, CONCAT(agenci.Imie,\" \",agenci.Nazwisko) as agent_nazwisko FROM agenci;";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=\"".$row['Id_agenta']."\">".$row['agent_nazwisko']."</option>";
                }
                ?>
            </select></label>
            <input type="submit" value="Wybierz">
        </form>
    </div>
</body>
</html>
<?php
    mysqli_close($conn);
?>