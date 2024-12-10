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
        <h1>Chałupy Welcome To</h1>
        <form action="#" method="POST">
            <?php
                echo "<label>Login: <input type=\"text\" name=\"loginek\"></label>";
                echo "<br><label>Hasło: <input type=\"password\" name=\"haselko\"></label>";
                echo "<br><input type=\"submit\" value=\"Zaloguj\">";
            ?>
        </form>
        <div class="dif">
                <br><?php
                    if(isset($_POST['loginek'])) {
                        $loginek_w = $_POST['loginek'];
                        $haselko_w = $_POST['haselko'];
                        $loginek_p = "AbraCham";
                        $haselko_p = "Yoyo";
                        if ($loginek_w == $loginek_p && $haselko_w == $haselko_p) {
                            $_SESSION['loginek'] = $loginek_p;
                            header("Location: zalogowane.php");
                        } else {
                            echo "Ojoj, niepoprawne haslo lol";
                        }
                    }
                ?>
        </div>
    </div>
</body>
</html>