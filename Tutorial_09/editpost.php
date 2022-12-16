<?php include 'header.php' ?>
<div class="container">
    <form method="post">
        <table class="table-comn">
            <tr>
                <th>Edit Post</th>
            </tr>
            <tr>
                <td>
                    <p>Title</p>
                    <input type="text" name="update-title" value=<?php if (isset($_GET['idpass'])) { $title = $_GET['idpass']; echo $title; ?>>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Content</p>
                    <textarea name="update-content" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="checkbox" id="" class="checkbox"> Publish
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
    include 'connection.php';
    error_reporting(0);
    // define variables and set to empty values
    $ctitle = $ccontent = $checkbox = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $ctitle = $title;
        $ccontent = test_input($_POST["update-content"]);
        $checkbox = test_input($_POST["checkbox"]);
        if (($checkbox) == "on") {
            $checkbox = 1;
        } else {
            $checkbox = 0;
        }
        $sql = "UPDATE EventList SET content='$ccontent' WHERE title='$ctitle'";
        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>