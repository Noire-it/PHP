<?php
$conn = mysqli_connect("localhost","root","","5ti_g1_konta");
if (!$conn) {
    die();
}

if(isset($_GET['osoba'])) { 
    $osoba = $_GET['osoba'];
    $bank = $_GET['bank'];
    $nr_konta = "";
    for ($i = 0;$i<26;$i++) {
        $random_number = rand(0,9);
        $nr_konta .= $random_number;
    }
    $sql = "INSERT INTO konta (konta.bank,konta.id_osoby,konta.nr_konta, konta.dostepne_srodki) VALUES ('$bank', $osoba, $nr_konta, 0); ";
    mysqli_query($conn,$sql);
    header("Location: index.php?nazwisko=$osoba");
    die();
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
            <label>Bank: <select name="bank">
                <?php
                    $sql = "SELECT DISTINCT konta.bank FROM konta;";
                    $result = mysqli_query($conn,$sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option>".$row['bank']."</option>";
                    }
                ?>
            </select></label>
            <label>Osoba: <select name="osoba">
                <?php
                    $sql = "SELECT CONCAT(osoby.imie,' ',osoby.nazwisko) AS osoba, osoby.id_osoby FROM osoby;";
                    $result = mysqli_query($conn,$sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['id_osoby']."'>".$row['osoba']."</option>";
                    }
                ?>
            </select></label>
            <input type="submit" value="Dodaj gracza">
        </form>
        <?php




        mysqli_close($conn);
        ?>
    </div>
</body>
</html>