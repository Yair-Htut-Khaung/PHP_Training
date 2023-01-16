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

    <div class="wrapper clear-fix">
        <div class="enter-textblk f-left">
            <h2 class="header">QR code generator</h2>
            <form method="post">

                <textarea name="qr_text" id="textforQR" cols="30" rows="10" class="textforQR" placeholder="Enter the text that you want to convert QR code" required></textarea> <br>
                <!-- <input type="textare" name="qr_text"> -->
                <input type="submit" name="generate_text" value="Generate QR" class="generate">
        </div>
        <div class="qr-display f-right">
            <h2 class="header">Generated QR</h2>

            <?php
            if (isset($_POST['generate_text']))
            {
                include('lib/qrlib.php');
                $text = $_POST['qr_text'];
                $rad = rand();
                //store random.png
                $location =  $rad . ".png";
                QRcode::png($text, $location);
                echo '<img src="' . $location . ' " class="qr-code" />';
                echo '<p class="succ">QR generated successfully in folder</p>';
            }
            ?>


        </div>
        </form>
    </div>
</body>

</html>