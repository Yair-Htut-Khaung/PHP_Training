<?php
include 'connection.php';
if (isset($_GET['idpass'])) {
    $id = $_GET['idpass'];
    echo $id;
    $sql = "DELETE FROM EventList WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    header("Location:index.php");

    $conn->close();
}
