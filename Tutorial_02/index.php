<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial2</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php

    echo "<h1>Tutorial 2</h1><br>";

    $row = 0; // loop for each row and decide how many times * will echo with $col_num count
    $col_num = 0; // loop for column at maximum count 11*
    $space = 6; // place for space before actually echo'*' placement

    echo "<div class='star'>";

    while ($col_num < 13)
    {
        $row = 0;

        while ($row < $space) 
        {
            if (($col_num % 2) == 0) 
            {
                echo "";
            } else {
                echo "<span class='space'>&nbsp</span>";
            }
            echo "<span class='space'>&nbsp</span>";
            $row++;
        }
        if (($col_num % 2) == 0) 
        {
        } else {
            $space--;
        }

        $row = 0;
        while ($row < $col_num) 
        {
            if (($col_num % 2) == 0) 
            {
                echo "";
            } else {
                echo " * ";
            }


            $row++;
        }

        echo "<br>";
        $col_num++;
    }

    $col_bottom = 9;
    $space = 4;
    while ($col_bottom >= 0) 
    {
        $row = 0;
        while ($row < $space) 
        {
            if (($col_bottom % 2) == 0) 
            {
                echo " ";
            } else {
                echo "<span class='space'>&nbsp</span>";
            }
            $row++;
        }
        $row = 0;

        while ($row < $col_bottom) 
        {
            if (($col_bottom % 2) == 0) 
            {
                echo " ";
            } else {
                echo " * ";
            }
            $row++;
        }

        echo "<br>";
        $col_bottom--;
        $space++;
    }

    echo "</div>";
    ?>
</body>

</html>