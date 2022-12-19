<?php
session_start();
$userid = $_SESSION["userId"];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual have an image 
if ($target_file == "uploads/")
{
    echo "not equal";
    include 'connection.php';
    $sql = "SELECT userprofile FROM UserList WHERE id = '$userid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {

        while ($row = $result->fetch_assoc())
        {
            echo "User profile: " . $row["userprofile"] . "<br>";
            $_FILES["fileToUpload"]["name"] = $row["userprofile"];
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        }
    } else {
        echo "0 results";
    }
    $conn->close();
} else {
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        include 'connection.php';
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $sql = "UPDATE UserList SET userprofile = '$target_file', username='$name', email='$email' WHERE id = '$userid'";

        if ($conn->query($sql) === TRUE)
        {
            mysqli_query($conn, "UPDATE UserList SET userprofile = '$target_file' WHERE id = '$userid'");
            echo "Update record created successfully";


            //header("Location:login.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        //header("Location:profile.php");
    } else {
        include 'connection.php';
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $sql = "UPDATE UserList SET  username='$name', email='$email' WHERE id = '$userid'";

        if ($conn->query($sql) === TRUE)
        {
            echo "Update user record  successfully";


            //header("Location:login.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>
<?php include 'footer.php' ?>