<?php
$cookie = "NotSelectedYet";
if ($cookie != " ") 
{
    $cookie = isset($_COOKIE["cookie-fold"]) ? $_COOKIE["cookie-fold"] : null;
}
?>
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
    <div class="form-index">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <h2 class="header">Select the image to upload</h2>
            <table class="table">
                <tr>
                    <td class="first-col"><span>Enter the folder name : </span></td>
                    <td><input type="text" class="input-field" required name="name" id="folder" ></td>
                </tr>
                <tr>
                    <td><span>Choose the image :</span></td>
                    <td><input type="file" name="fileToUpload" id="fileToUpload" class="first-col" required></td>
                </tr>
                <tr>
                    <td colspan="2" class="pos-submit">
                        <input type="submit" value="Upload Image" name="submit" class="submit">
                    </td>
                </tr>
            </table>
        </form>
        <h4 class="current-folder"> Current Folder > 
            <?php
            echo $cookie;
            ?>
        </h4>
        <div class="show-div">
            <ul class="show-listul">
                <!--to check if $_POSR array has a key delete_file-->
                <?php
                if (array_key_exists('delete_file', $_POST))
                {   
                    //image name from the img hidden tag
                    $filename = $_POST['delete_file'];
                    if (file_exists($filename)) {
                        unlink($filename);
                        echo '<span class="succ">File ' . $filename . ' has been deleted</span>';
                    } else {
                        echo '<span class="error">Could not delete ' . $filename . ', file does not exist</span>';
                    }
                }
                //selected folder total count image
                $count_image = glob($cookie . "/*.*");

                for ($i = 0; $i < count($count_image); $i++) 
                {
                    $image = $count_image[$i];

                    echo '<li class="show-list"><form method="post"';
                    echo '<td><img src="' . $image . '" alt="Random image" class="show-img" />';
                    echo '<input type="hidden" value="' . $image . '" name="delete_file" />';
                    echo '<input type="submit" value="Delete" class="delete"></td>';
                    echo '</form></li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <script src="js/library/jquery-3.6.1.min.js"></script>
    <script src="js/common.js"></script>
</body>

</html>