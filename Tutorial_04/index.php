<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-form">
        <h1>Welcome to our Website</h1>
        <form method="post" action="login.php">
            <table>
                <tr>
                    <td>Name:
                    </td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>Email:
                    </td>
                    <td><input type="text" name="email" required></td>
                </tr>
                <tr>
                    <td>Password:
                    </td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td></td> 
                    <td><input type="submit" name="submit" value="Login"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
