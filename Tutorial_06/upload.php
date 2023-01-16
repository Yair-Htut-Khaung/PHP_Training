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
    <div class="warning">
        <?php
        error_reporting(E_ALL ^ E_WARNING); 
        error_reporting(0);
        //folder name will get from index submit
        $folder_name = " ";

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"]))
        {

            //get folder_name from index.php name input field
            $folder_name = test_input($_POST["name"]);

            //make folder if dont have folder from name that enter form input field index.php
            // if (!is_dir('C:/Apache24/htdocs/yair_htut_khaung/PHP_Training/Tutorial_06/' . $folder_name)) {
            //     mkdir('C:/Apache24/htdocs/yair_htut_khaung/PHP_Training/Tutorial_06/' . $folder_name, 0777, true);
            // }
            if (!is_dir( $folder_name)) {
                mkdir( $folder_name, 0777, true);
            }

            //action to put image file to created folder
            $target_dir = $folder_name . '/';
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            echo $check;
            if ($check !== false) {
                echo "<p class='comn-p'>File is an image - " . $check["mime"] . ".</p>";
                $uploadOk = 1;
            } else {
                echo "<p class='comn-p'>File is not an image.</p>";
                $uploadOk = 0;
            }
        }

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



        // Check if file already exists
        if (file_exists($target_file))
        {
            echo "<p class='error'>Sorry, file already exists.</p>";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "<p class='warn'>Sorry, your file is too large.</p>";
            $uploadOk = 0;
        }


        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") 
            {
            echo "<p class='error'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0)
        {
            echo "<p class='error'>Sorry, your file was not uploaded.</p>";
            // if everything is ok, try to upload file
        } else {

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
            {
                echo "<p class='succ'>The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.</p>";
            } else {
                echo "<p class='error'>Sorry, there was an error uploading your file.</p>";
            }
        }
        ?>
        <!--give current folder name to create cookie-->
        <form action="index.php" method="POST">
            <input type="hidden" name="varname" value=<?php echo htmlspecialchars($folder_name); ?>>
            <input type="submit" value="Back" class="submit">
        </form>
    </div>
</body>

</html>