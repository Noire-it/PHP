<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela wydatków [ft. ZUS]</title>
    <style>
        body {background-color: #333333; color: white}
        table, th, td {border: 1px solid white}
        tr:nth-child(even):hover {background-color: blue}
        tr:nth-child(odd):hover {background-color: yellow; color: black}
    </style>
</head>
<body>
    <form action="">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "5ti_g1_filmy");
        if  (!$conn) {
            die ("Połączenie nieudane".mysqli_connect_error());
        }
        ?>
        <label> Litera: <select name="litera">
            <option value="%">Wszyscy</option>
            <?php
            $sql = "SELECT LEFT(klienci.Nazwisko,1) AS litera FROM klienci;";
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option>".$row['litera']."</option>\n";
            }
            ?>
        </select></label>
        <input type="submit" value="Pokaż">
    </form>
    <table>
        <tr><th>Klient</th>
        <th>Wydatki</th></tr>
        <?php
        if (isset($_GET['litera'])) {
            $litera = $_GET['litera'];
            $sql = "SELECT CONCAT(klienci.Imie,' ',klienci.Nazwisko) AS Klient FROM klienci WHERE LEFT(nazwisko,1) LIKE '$litera';";
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row['Klient']."</td><td>ZUS zabrał pieniądze</td></tr>\n";
            }
        }

        
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>