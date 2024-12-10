<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dif2">
        <?php
        $tableName = $_GET['tableName'];
        $numOfCollumns = $_GET['numOfColls'];

        echo "<h1>Nazwa tabeli: ".$tableName."</h1>";
        echo "<form>";
        for ($i = 1; $i <= $numOfCollumns; $i++) {
            echo "<label class='label1'>Nazwa: <input type='text' name=''><select><option>TEXT</option><option>INT</option></select></label><br>";
        }
        echo "<input type='submit' value='Wykonaj'>";
        echo "</form>";

        // $n = 'tabelka';
        // $dana = $_GET['dana'];
        // $sql = "CREATE TABLE IF NOT EXISTS $n (";
        // for ($i=0;$i<count($dana);$i++) {
        //     $sql .= $dana['$i']." INT";
        //     if ($i>count($dana)-1) {
        //         $sql = .= ", ";
        //     }
        // }
        // $sql .= ")";
        ?>
    </div>
</body>
</html>