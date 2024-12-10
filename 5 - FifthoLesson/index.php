<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
        $conn = mysqli_connect("localhost","root","","5ti_g1_perfumy");

        $sql = "SELECT
        perfumy.nazwa_p,
        perfumy.cena,
        perfumy.rodzina_zapachow
    FROM
        perfumy
    JOIN(
        SELECT
            perfumy.rodzina_zapachow AS rodzina,
            MIN(cena) AS mincena
        FROM
            perfumy
        GROUP BY
            perfumy.rodzina_zapachow
    ) AS d
    ON
        rodzina = perfumy.rodzina_zapachow AND perfumy.cena = mincena;"

        ?>
</body>
</html>