<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php

    echo "<h2 class='header'>Document type file</h2>";

    $myfile = fopen("file/txtfile.txt", "r") or die("Unable to open file!");
    echo "<p class='description'>";
    echo fread($myfile, filesize("file/txtfile.txt"));
    fclose($myfile);
    echo "</p>"

    ?>

    <h2 class="header">Excel type File</h2>
    <table class="table">
        <?php
        // (A) PHPSPREADSHEET TO LOAD EXCEL FILE
        require "vendor/autoload.php";
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load("file/sample1.xlsx");
        $worksheet = $spreadsheet->getActiveSheet();

        // (B) LOOP THROUGH ROWS OF CURRENT WORKSHEET
        foreach ($worksheet->getRowIterator() as $row)
        {
            // (B1) READ CELLS
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            // (B2) OUTPUT HTML
            echo "<tr class='first-row'>";
            foreach ($cellIterator as $cell)
            {
                echo "<td>" . $cell->getValue() . "</td>";
            }
            echo "</tr>";
        }
        ?></table>

    <?php

    echo "<h2 class='header'>Doc type read</h2>";

    function readWord($filename)
    {
        if (file_exists($filename))
        {
            if (($fh = fopen($filename, 'r')) !== false)
            {

                $headers = fread($fh, 0xA00);

                // 1 = (ord(n)*1) ; Document has from 0 to 255 characters
                $n1 = (ord($headers[0x21C]) - 1);

                // 1 = ((ord(n)-8)*256) ; Document has from 256 to 63743 characters
                $n2 = ((ord($headers[0x21D]) - 8) * 256);

                // 1 = ((ord(n)*256)*256) ; Document has from 63744 to 16775423 characters
                $n3 = ((ord($headers[0x21E]) * 256) * 256);

                // 1 = (((ord(n)*256)*256)*256) ; Document has from 16775424 to 4294965504 characters
                $n4 = (((ord($headers[0x21F]) * 256) * 256) * 256);

                // Total length of text in the document
                $textLength = ($n1 + $n2 + $n3 + $n4);

                $extracted_plaintext = fread($fh, $textLength);

                return $extracted_plaintext;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    $docplain =  readWord('file/sample.doc');
    echo "<p class='description'>$docplain</p>";



    ?>
    <?php
    echo '<h2 class="header">CSV file type read</h2>';
    echo '<table class="table">';
    $start_row = 1;
    if (($csv_file = fopen("file/sample.csv", "r")) !== FALSE)
    {
        while (($read_data = fgetcsv($csv_file, 1000, ",")) !== FALSE)
        {
            $column_count = count($read_data);
            echo '<tr>';
            $start_row++;
            for ($c = 0; $c < $column_count; $c++) {
                echo "<td>" . $read_data[$c] . "</td>";
            }
            echo '</tr>';
        }
        fclose($csv_file);
    }
    echo '</table>';
    ?>

</body>

</html>