<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial1</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php

    echo "<h1>Tutorial 1</h1><br>";

    $chess_column = 0; // number of columns in chess board
    $chess_row = 0; // number of rows in chess board

    echo "<table>";

    while ($chess_column < 8) 
    {
        echo "<tr>";

        while ($chess_row < 8) 
        {
            if (($chess_column % 2) == 0) 
            {
                //decide white box or black box according to $row
                if (($chess_row % 2) == 0) 
                {
                    echo "<td class='box2'></td>";
                } else {
                    echo "<td class='box1'></td>";
                }
            } else {
                if (($chess_row % 2) == 0) 
                {
                    echo "<td class='box1'></td>";
                } else {
                    echo "<td class='box2'></td>";
                }
            }

            $chess_row++;
        }

        echo "</tr>";

        $chess_row = 0;
        $chess_column++;
    }

    echo "</table>";

    ?>
</body>

</html>