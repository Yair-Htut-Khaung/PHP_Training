<?php include 'header.php';
include 'connection.php';
error_reporting(0);
session_start();
$user = $_SESSION["user"];
$userid = $_SESSION["userId"];

$sql = "SELECT userprofile FROM UserList WHERE id = '$userid'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        
        $profile_pic = $row["userprofile"];
       
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<div class="wrapper">
    <header class="header">
        <div class="l-container clear-fix">

            <h2 class="title f-left">Home</h2>

            <?php if ($user == "")
            {
                echo '<a href="register.php" class="comn-btn f-right">Register</a>';
                echo '<a href="login.php" class="comn-btn f-right">Login</a>  ';
            } else {
                echo '<div class="dropdown f-right">';
                echo '<button class="dropbtn"><img src=' . $profile_pic . ' alt="" class="profile"></button>';
                echo '<div class="dropdown-content">';
                echo '<a href="profile.php">Profile</a>';
                echo '<a href="logout.php">Logout</a>';
                echo '</div></div>';
            }
            ?>
        </div>
</div>
</header>
<div class="l-container">
    <h2 class="mv">Welcome <span class="user"><?php echo $user ?></span> From My Website</h2>
</div>
</div>
<?php include 'footer.php' ?>