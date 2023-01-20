<?php include 'header.php' ?>
<div class="l-container">
    <div class="profile-card">
        <h3 class="profile-ttl">Login</h3>
        <form method="post" class="form">

            <p class="comn-inputp">Email</p>
            <input type="email" name="email" class="inputtext" placeholder="name@example.com" id="" required>
            <p class="comn-inputp">Password</p>
            <input type="password" name="password" id="" class="inputtext" placeholder="password" required>
            <a href="forgotpass.php" class="forgotpass">forget password ?</a>
            <input type="submit" value="Login" class="fullwidth-bth comn-btn sign-in">
            <span>Not a member ? <a href="register.php" class="signup">Sign up</a></span>

        </form>
    </div>
</div>
<?php
// define variables and set to empty values
$name = $email = $phone = $password = $address = "";
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $sql = "SELECT id, username, email, userpassword FROM UserList";
    $result = $conn->query($sql);
    $flat = 0;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $tempmail = $row["email"];
            $temppass = $row["userpassword"];

            if ("$email" == "$tempmail" && "$password" == "$temppass")
            {
                $username = $row["username"];
                $userid = $row["id"];
                session_start();
                $_SESSION["user"] = $username;
                $_SESSION["userId"] = $userid;

                $flat = 1;
                echo "<div class='message'><span class='message-succ'>Login success....</span></div>";
                header("refresh:1;url=index.php");
            }
        }
    } else {
        echo "0 results";
    }
    if ($flat == 0) {
        echo "<div class='message'><span class='message-error'>Username or Password wrong or account doesnt exist....</span></div>";
        header("refresh:1;url=login.php");
    }
    $conn->close();
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