<?php include 'header.php' ?>
<div class="container">
    <h2>Post Detail</h2>
    <table class="tableview table">
        <?php
        include 'connection.php';
        if (isset($_GET['idpass']))
        {
            $id = $_GET['idpass'];
            echo $id;
            $sql = "SELECT title , content, is_published, created_datetime FROM EventList WHERE id = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    if (($row["is_published"] == true))
                    {
                        $publish = "Published";
                    } else {
                        $publish = "Unpublished";
                    }
                    echo "<tr><td class='viewtitle'> " . $row["title"] . "</td></tr>";
                    echo "<tr><td class='viewpublish'> " . $publish . "</td><td>" . $row["created_datetime"] . "</td></tr>";
                    echo "<tr><td class='viewcontent'> " . $row["content"] . "</td></tr>";
                }
            } else {
                echo "0 results";
            }
        }
        include 'footer.php';
?>