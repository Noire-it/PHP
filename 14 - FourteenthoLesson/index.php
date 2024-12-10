<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost","root","","5ti_g1_mecze");
    $sql_s = "SELECT * from sedziowie";
    $result_s = mysqli_query($conn, $sql_s);
    echo "<table>\n";
    echo "<tr><td class=\"pierwszy\">Sędzia</td>";
    $sql_k = "SELECT nazwa FROM kluby ORDER BY nazwa";
    $result_k = mysqli_query($conn,$sql_k);
    while ($klub = mysqli_fetch_assoc($result_k)) {
        echo "<td><div class=\"bokiem\">".$klub['nazwa']."</div></td>";
    }
    echo "</tr>";
    while ($sedzia = mysqli_fetch_assoc($result_s)) {
        echo "<tr><td>".$sedzia['Imie']." ".$sedzia['Nazwisko']."</td>";
        $id_sedziego = $sedzia['Id_sedziego'];
        $sql_k = "select id_klubu, count(id_sedziego) as ile\n"
        . "from kluby left join\n"
        . "(SELECT * from mecze where id_sedziego = $id_sedziego) as pom\n"
        . "using (id_klubu)\n"
        . "GROUP by Id_klubu ORDER BY nazwa;";
        $result_k = mysqli_query($conn,$sql_k);
        while ($klub = mysqli_fetch_assoc($result_k)) {
            echo "<td>".$klub['ile']."</td>";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";

    mysqli_close($conn);
    ?>
    
</body>
</html>