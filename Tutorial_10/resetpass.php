<?php include 'header.php';
session_start();
$tryuser = $_SESSION["tryloginuser"];
?>
<div class="l-container">
    <div class="profile-card">
        <h3 class="profile-ttl">Login</h3>
        <form method="post" class="form">

            <p class="comn-inputp">Email</p>
            <input type="email" name="email" class="inputtext" value="<?php echo $tryuser;  ?>" disabled>

            <p class="comn-inputp">New Password</p>
            <input type="password" name="password" id="" class="inputtext" placeholder="password" required>

            <p class="comn-inputp">Confirm Password</p>
            <input type="password" name="cpassword" id="" class="inputtext" placeholder="password" required>
            <div class="clear-fix">
                <input type="submit" value="Confirm" class="comn-btn f-right">
            </div>

        </form>
    </div>
</div>
<?php

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $password = test_input($_POST["password"]);
    $cpassword = test_input($_POST["cpassword"]);

    if ("$password" !== "$cpassword")
    {
        echo "<div class='message'><span class='message-error'>password are not matching....</span></div>";
        header("refresh:1;url=resetpass.php");
    } else {
        $sql = "UPDATE UserList SET userpassword='$password' WHERE email='$tryuser' ";
        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo "<div class='message'><span class='message-succ'>password updated successfully....</span></div>";
            header("refresh:1.5;url=login.php");


            // header( "refresh:2;url=index.php" );
        } else {
            echo "<div class='message'><span class='message-error'>unexpected error coour in querry....</span></div>";
            header("refresh:1.5;url=login.php");
        }
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
<?php include 'footer.php' ?>