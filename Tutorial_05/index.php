<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
</body>
</html>
<?php

echo "<h2 class='header'>Reading the txtfile.txt document here</h2>";

$myfile = fopen("file/txtfile.txt", "r") or die("Unable to open file!");
echo "<p class='description'>";
echo fread($myfile, filesize("file/txtfile.txt"));
fclose($myfile);
echo "</p>"

?>