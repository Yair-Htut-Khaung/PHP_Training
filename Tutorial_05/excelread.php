<?php

/** @noinspection ForgottenDebugOutputInspection */

use Shuchkin\SimpleXLSX;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once 'file\SimpleXLSX.php';

echo "<h2 class='header'>Excelfile.xslx</h2><pre class='description'>";
if ($xlsx = SimpleXLSX::parse('file\excelfile.xlsx'))
{
    print_r($xlsx->rows());
} else {
    echo SimpleXLSX::parseError();
}

echo '</pre>';

?>
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