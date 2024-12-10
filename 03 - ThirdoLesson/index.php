<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form action="">
        <label> <input type="radio" name="plec" value="wszyscy" checked>Wszyscy</label> 
        <label> <input type="radio" name="plec" value="kobiety">Kobiety</label> 
        <label> <input type="radio" name="plec" value="mezczyzni">Mężczyźni</label> 
        <input type="submit" value="Pokaż">
    </form>


    <?php    
    //Pierwsza jest obiektowa wersja
    $s = "localhost";
    $u = "root";
    $p = "";
    $db = "5ti_g1_filmy";



    // $conn = new mysqli($s,$u,$p,$db);
    $conn = mysqli_connect($s,$u,$p,$db);



    // if $conn->connect_error {
    //     die ("Połączenie nieudane".$conn->connect_error);
    // }
    if (!$conn) {
        die ("Połączenie nieudane ".mysqli_connect_error());
    }

   if (isset($_GET['plec'])) {
        
    $plec = $_GET['plec'];
    
    if ($plec = "wszyscy") {
        $sql1 = "SELECT imie, nazwisko FROM klienci WHERE imie LIKE '%' ORDER BY nazwisko, imie;";
        $result = mysqli_query($conn,$sql1);
    } elseif ($plec = "kobiety") {
        $sql2 = "SELECT imie, nazwisko FROM klienci WHERE imie LIKE '%a' ORDER BY nazwisko, imie;";
        $result = mysqli_query($conn,$sql2);
    } elseif ($plec = "mezczyzni") {
        $sql3 = "SELECT imie, nazwisko FROM klienci WHERE imie NOT LIKE '%a' ORDER BY nazwisko, imie;";
        $result = mysqli_query($conn,$sql3);
    }


    // $result = $conn->query($sql);
    // $result = mysqli_query($conn,$sql);



    // if ($result->num_rows > 0) {
    //     echo "<ol>";
    //     while ($row = $result->fetch_assoc())
    //         echo "<li>".$row['imie']." ".$row['nazwisko']."</li>\n";
    //     echo "</ol>";
    // } else {
    //     echo "Nie ma kobiet wśród klientów";
    // }

    
    if (mysqli_num_rows($result) >0) {
        echo "<ol>";
        while ($row = mysqli_fetch_assoc($result))
            echo "<li>".$row['imie']." ".$row['nazwisko']."</li>\n";
        echo "</ol>";
    } else {
        echo "Nie ma klientów";
    }



    // $conn->close();
    }
    mysqli_close($conn);
    ?>
</body>
</html>