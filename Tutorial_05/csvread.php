<?php
echo "<h2 class='header'>Reading the CSV file</h2>";
if (($open = fopen('file/sameple.csv', 'r')) !== FALSE)
{
    while (($data = fgetcsv($open, 1000, ",")) !== FALSE)
    {

        $array[] = $data;
    }
    fclose($open);
}

echo "<pre class='description'>";
print_r($array);
echo "</pre>";
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