<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="imie">Imię: <input type="text" name="imie" id="imie" required></label><br>
        <label for="nazwisko">Nazwisko: <input type="text" name="nazwisko" id="nazwisko" required></label><br>
        <input type="submit" value="Dodaj">
    </form>
    <?php
    $conn = mysqli_connect("localhost","root","","5ti_g1_domy");
    if (isset($_POST['imie'])) {
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $sql = "INSERT INTO agenci (imie, nazwisko) VALUES (\"$imie\", \"$nazwisko\")";
        mysqli_query($conn, $sql);
    }






    $sql = "SELECT imie, nazwisko FROM agenci ORDER BY nazwisko";
    $result = mysqli_query($conn, $sql);
    echo "<ol>\n";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>".$row['imie']." ".$row['nazwisko']."</li>\n";
    }
    echo "</ol>\n";
    mysqli_close($conn);
    ?>
</body>
</html>