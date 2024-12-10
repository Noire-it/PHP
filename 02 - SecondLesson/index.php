<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {background-color: #333333; color: white}
        table,th,td {border: 1px solid white       }
        th {background-color: white; color: black}
        tr:nth-child(even):hover {background-color: blue; color: white}
        tr:nth-child(odd):hover {background-color: green; color: yellow}
    </style>
</head>
<body>
    <table>
        <tr><th>imie</th>
        <th>nazwisko</th>
        <th>liczba wyporzyczen</th></tr>
        <?php
        require 'connect.php';

        $sql = "
                    SELECT
                        klienci.Imie,
                        klienci.Nazwisko,
                        COUNT(*) AS ilosc_wypozyczen
                    FROM
                        klienci
                    JOIN wyporzyczenia USING(Pesel)
                    GROUP BY
                        klienci.Pesel
                    ORDER BY
                        klienci.Nazwisko,
                        klienci.Imie;";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['Imie']."</td><td>".$row['Nazwisko']."</td><td>".$row['ilosc_wypozyczen']."</td></tr>\n";
        }


        mysqli_close($conn);
        ?>
    </table>
</body>
</html>