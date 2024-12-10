<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,th,td {border: 1px solid black}
        th {background-color: white; color:black}
        tr:nth-child(even):hover {background-color: blue; color: white}
        tr:nth-child(odd):hover {background-color: green; color: yellow}
    </style>
</head>
<body>
    <form>
        <select name="rasa">
            <option value="%">wszystkie rasy</option>
    <?php
    require 'connect.php';

    $sql = "SELECT DISTINCT rasa FROM psy ORDER BY rasa ASC;";
    $result=mysqli_query($conn,$sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option>".$row['rasa']."</option>\n";
    }
    ?>
        </select>
        <input type="submit">
    </form>
    <table>
        <tr><th>Płeć</th>
        <th>Rasa</th>
        <th>Wiek</th>
        <th>Zdobyte medale</th>
        <th>Właściciel</th></tr>
    <?php
    $rasa = "%";
    if (isset($_GET['rasa']))
        $rasa = $_GET['rasa'];

    $sql = "SELECT * FROM `psy` JOIN osoby ON psy.id_osoby=osoby.id_osoby WHERE rasa LIKE '$rasa';";
    
    $result=mysqli_query($conn,$sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row['płeć']."</td><td>".$row['rasa']."</td><td>".$row['wiek']."</td><td>".$row['medale']."</td><td>".
        $row['imię']." ".$row['nazwisko']."</td></tr>\n";
    }
    



    mysqli_close($conn);
    ?>
    </table>
</body>
</html>