<?php
    session_start();
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
        <?php
            $loginek_p = $_SESSION['loginek'];
            echo "Zalogowano jako $loginek_p";
            echo "<br><br><br>";
            echo "<label>Kasowanie historii przeglądania <img src=\"dots.gif\" class=\"dots\"></label>";
        ?>
    </div>
</body>
</html>