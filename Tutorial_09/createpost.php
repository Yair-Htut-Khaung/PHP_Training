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
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <table class="table-comn">
                <tr>
                    <th>Create Post</th>
                </tr>
                <tr>
                    <td>
                        <p>Title</p>
                        <input type="text" name="create-title" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Content</p>
                        <textarea name="create-content" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="checkbox" value="0">
                        <input type="checkbox" name="checkbox" id="" class="checkbox" value="1"> Publish
                        <div class="clear-fix">
                            <a href="index.php" class="back f-left">Back</a>
                            <input type="submit" name="submit" class="submit f-right">
                        </div>

                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
<?php
// define variables and set to empty values
$ctitle = $ccontent = "";

$checkbox = "0";


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $ctitle = test_input($_POST["create-title"]);
    $ccontent = test_input($_POST["create-content"]);
    $checkbox = test_input($_POST["checkbox"]);
    echo $checkbox;
    if (($checkbox) == "1") {
        $checkbox = 1;
    } else {
        $checkbox = 0;
    }

    include 'connection.php';

    $sql = "INSERT INTO EventList (title, content, is_published)
  VALUES (  ' $ctitle' ,  '$ccontent',    $checkbox  )";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    //header("Location:index.php");
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>