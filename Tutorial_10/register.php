<?php include 'header.php';
include 'connection.php';
?>
<div class="l-container">
    <div class="regi-card profile-card">
        <h3 class="profile-ttl">Register</h3>
        <form method="post" class="form">

            <p class="comn-inputp">Name</p>
            <input type="text" name="name" id="" class="inputtext" placeholder="name" required>
            <p class="comn-inputp">Email</p>
            <input type="email" name="email" class="inputtext" placeholder="name@example.com" required>
            <p class="comn-inputp">Phone</p>
            <input type="text" name="phone" class="inputtext" placeholder="09*********" required>
            <p class="comn-inputp">Password</p>
            <input type="password" name="password" class="inputtext" placeholder="password" required>
            <p class="comn-inputp">Address</p>
            <input type="text" name="address" class="inputtext" required>
            <input type="submit" value="Register" class="fullwidth-bth comn-btn">
            <span><a href="login.php" class="signup">Already have an account ?</a></span>

        </form>
    </div>
</div>
<?php
// define variables and set to empty values
$name = $email = $phone = $password = $address = "";

include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $password = test_input($_POST["password"]);
    $address = test_input($_POST["address"]);

    $sql = "SELECT email FROM UserList";
    $result = $conn->query($sql);
    $flat = 0;
    if ($result->num_rows > 0)
    {
        // output data of each row
        while ($row = $result->fetch_assoc())
        {

            if ($email ==  $row["email"])
            {
                echo "<div class='message'><span class='message-error'>This mail already have an account....</span></div>";
                header("refresh:3;url=register.php");
                $flat = 1;
            }
        }
    } else {
        echo "0 results";
    }

    if ($flat == 0)
    {
        $sql = "INSERT INTO UserList (username, email, phone, userpassword, useraddress, userprofile)
        VALUES (  '$name' ,  '$email' , $phone , '$password' , '$address', 'uploads/user.png'  )";

        if ($conn->query($sql) === TRUE)
        {
            echo "<div class='message'><span class='message-succ'>Created new account....</span></div>";
            header("refresh:3;url=login.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
<?php include 'footer.php' ?>