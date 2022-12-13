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
    <form action="upload.php" method="post" enctype="multipart/form-data" class="form-index">

        <h2 class="header">Select the image to upload</h2>
        <table>
            <tr>
                <td class="first-col"><span>Enter the folder name : </span></td>
                <td><input type="text" placeholder="uploads" class="input-field" required name="name"></td>
            </tr>
            <tr>
                <td><span>Choose the image :</span></td>
                <td><input type="file" name="fileToUpload" id="fileToUpload" class="first-col" required></td>
            </tr>
            <tr>
                <td colspan="2" class="pos-submit"><input type="submit" value="Upload Image" name="submit" class="submit"></td>
            </tr>
        </table>
        <div class="show-div">

            <table>
                <tr>
                    <?php
                    
                    $files = glob("yair/*.*");
                    //in progress --> deleting file .. causing error of form submit not working
                    for ($i = 0; $i < count($files); $i++) 
                    {
                        $image = $files[$i];

                        echo '<form method="post">';
                        echo '<td><img src="' . $image . '" alt="Random image" class="show-img" />';
                        echo '<input type="hidden" value="' . $image . '" name="delete_file" />';
                        echo '<input type="submit" name="form2" value="Delete" class="delete"></td>';
                        echo '</form>';
                    }
                    //in progress
                    ?>
                </tr>
            </table>
        </div>

    </form>
    <script src="js/library/jquery-3.6.1.min.js"></script>
    <script src="js/common.js"></script>
</body>

</html>