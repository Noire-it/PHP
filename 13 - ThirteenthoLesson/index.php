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
            <label for="klient">Klient</label>
            <select name="klient" id="klient">
            <?php
            $conn = mysqli_connect("localhost","root","","5ti_g1_konta");
            $sql = "SELECT ID,imie,nazwisko FROM test ORDER BY nazwisko,imie";
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value=\"".$row['ID']."\">";
                echo $row['imie']." ".$row['nazwisko'];
                echo "</option>";
            }
            ?>
            </select>
            <input type="submit" name="kilimandżaro" value="Wyświetl">
            <input type="submit" name="kilimandżaro" value="Dodaj">
            <input type="number" name="qwota" value="100">
        </form>
            <?php
            if (isset($_GET['kilimandżaro'])) {
                $klient = $_GET['klient'];

                if ($_GET['kilimandżaro']=="Dodaj") {
                    $qwota = $_GET['qwota'];
                    $sql = "UPDATE test SET srodki = srodki + $qwota WHERE ID=$klient";
                    mysqli_query($conn,$sql);
                }

                $sql = "SELECT * FROM test WHERE ID=$klient";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                echo "<h1>".$row['imie']." ".$row['nazwisko']." ma ".$row['srodki']." PLN.</h1>";
                mysqli_close($conn);
            }
            ?>
    </div>
</body>
</html>