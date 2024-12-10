<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,th,td {border: 1px solid black}
        th {background-color: white; color:black}
    </style>
</head>
<body>
    <form action="">
        <select name="miesiac">
            <option value="1">styczeń</option>
            <option value="2">luty</option>
            <option value="3">marzec</option>
            <option value="4">kwiecień</option>
            <option value="5">maj</option>
            <option value="6">czerwiec</option>
            <option value="7">lipiec</option>
            <option value="8">sierpień</option>
            <option value="9">wrzesień</option>
            <option value="10">październik</option>
            <option value="11">listopad</option>
            <option value="12">grudzień</option>
        </select>
        <select name="rok">
            <?php
            require 'connect.php';
            if  (!$conn) {
                die("Połączenie nieudane ".mysqli_connect_error());
            }
            $sql = "SELECT DISTINCT YEAR(wyporzyczenia.Data_wyp) AS wyporzyczenia FROM wyporzyczenia;";
            $result = mysqli_query($conn,$sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option>".$row['wyporzyczenia']."</option>\n";
            }
            ?>
        </select>
        <input type="submit" value="Wybierz">
    </form><br>
    <table>
        <tr><th>tytuł</th>
        <th>data</th>
        <th>imie</th>
        <th>nazwisko</th></tr>
    <?php
    if (isset($_GET['miesiac'])) {
        $miesiac = $_GET['miesiac'];
        $rok = $_GET['rok'];

        $sql2 = "SELECT ";
        
    }

    mysqli_close($conn);
    ?>
    </table>
</body>
</html>