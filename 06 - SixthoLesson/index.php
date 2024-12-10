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
    <h1>Kreator kreatora:</h1>
        <form class="form" action="">
            <label>Nazwa tabeli: <input type="text" name="tableName"></label><br>
            <label>Liczba kolumn: <input type="number" name="numOfColls" min="1" max="23"></label><br>
            <input type="submit" value="Utwórz">
        </form>
    </div>
    <div class="dif">
        <?php
        if (isset($_GET['tableName'])) {
            $tableName = $_GET['tableName'];
            $numOfCollumns = $_GET['numOfColls'];

            echo "<h1>Nazwa tabeli: ".$tableName."</h1>";
            echo "<form action='index2.php'>";
            for ($i = 1; $i <= $numOfCollumns; $i++) {
                echo "<label class='label1'>Nazwa: <input type='text' name=''><select><option>TEXT</option><option>INT</option></select></label><br>";
            }
            echo "<input type='submit' value='Wykonaj'>";
            echo "</form>";
            }
        ?>
    </div>
</body>
</html>