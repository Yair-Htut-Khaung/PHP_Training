<?php include 'header.php' ?>
<div class="container mv-sec">

    <div class="clear-fix">
        <a href="createpost.php" class="edit create f-left">Create</a>
        <a href="weekly.php" class="edit create f-left">Graph</a>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Type your key word here..." title="Type in a name" class="searchbar f-right">
    </div>
    <table class="table" id="myTable">

        <thead>
            <tr class="all-tablehead">
                <th rowspan="6" class="post-list">Post List</th>
            </tr>
            <tr class="all-tablehead">
                <th>Id</th>
                <th>Title</th>
                <th class="content">Content</th>
                <th class="publish">Is published</th>
                <th class="cur-date">Created date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="schedule-row-loop-div">

            <?php
            include 'connection.php';
            $sql = "SELECT id, title , content, is_published, created_datetime FROM EventList";
            $result = $conn->query($sql);
            $count = 1;

            if ($result->num_rows > 0)
            {
                // output data of each row
                while ($row = $result->fetch_assoc())
                {

                    if (($row["is_published"] == true))
                    {
                        $publish = "Published";
                    } else {
                        $publish = "Unpublished";
                    }

                    $id = $row["id"];
                    $title = $row["title"];
            ?>
                    <?php
                    $dateformat = $row["created_datetime"];
                    $newDate = date("M-d-y", strtotime($dateformat));


                    echo "<tr class='schedule-row-loop'>";
                    echo "<td> " . $count . "</td><td> " . $row["title"] . "</td><td class='content' > " . $row["content"] .  "</td><td class='publish'> " . $publish . " </td><td class='cur-date'>" . $newDate . " </td>";
                    ?>
                    <td class="action-width">
                        <form action="postdetail.php?idpass=<?php echo $id ?>" method="POST" class="form-action">
                            <input type="submit" class="action view" value="View">
                        </form>
                        <form action="editpost.php?idpass=<?php echo $title ?>" method="POST" class="form-action">
                            <input type="submit" class="action edit" value="Edit">
                        </form>
                        <form action="delete.php?idpass=<?php echo $id ?>" method="POST" class="form-action">
                            <input type="submit" onclick="return confirm('Are you sure you want to do that?');" class="action delete" value="Delete">
                        </form>


                    </td>
<?php

            echo "</tr>";
            $count++;
                }
            } else {
                echo "0 results";
            }
            include 'footer.php';
 ?>