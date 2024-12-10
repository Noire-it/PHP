<?php
$conn = mysqli_connect("localhost","root","","5ti_g1_filmy");
if (!$conn) {
    die("Nieudane połączenie".mysqli_connect_error());
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
            <label>Filmy: 
                <select name="filmy">
                    <?php
                        $sql = "SELECT filmy.ID_filmu, filmy.Tytul FROM filmy ORDER BY filmy.Tytul;";
                        $result = mysqli_query($conn,$sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='".$row['ID_filmu']."'>".$row['Tytul']."</option>";
                        }
                    ?>
                </select>
            </label>
            <label>Klient: 
                <select name="klienci">
                <?php
                        $sql = "SELECT klienci.Pesel, CONCAT(klienci.Imie,' ',klienci.Nazwisko) AS Oni FROM klienci ORDER BY Oni;";
                        $result = mysqli_query($conn,$sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='".$row['Pesel']."'>".$row['Oni']."</option>";
                        }
                    ?>
                </select>
            </label>
            <label><input type="date" name="data"></label>
            <input type="submit" value="Dodaj">
        </form>
    </div>
    <?php
    if (isset($_GET['filmy'])) {
        $filmy = $_GET['filmy'];
        $klienci = $_GET['klienci'];
        $data = $_GET['data'];

        $sql = "INSERT INTO wyporzyczenia (wyporzyczenia.Pesel, wyporzyczenia.Data_wyp, wyporzyczenia.ID_filmu) VALUES ($klienci, $data, $filmy);";
    }
    mysqli_close($conn);
    ?>
</body>
</html>