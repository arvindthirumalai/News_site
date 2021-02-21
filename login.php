<!doctype HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "login.css" rel = "stylesheet"/>
    <title>Login</title>
</head>
<body>
    <form enctype="multipart/form-data" action = "verifyLogin.php" method = "POST">
        <p> Enter Username and Password: </p>
        <input type = "text" name = "username" value = "Username" />
        <br />
        <input type = "text" name = "password" value = "Password" />
        <br />
        <input type = "submit" name = "login" value = "Login" />
        <br />
    </form>
    <form enctype="multipart/form-data" action = "register.php" method = "POST">
         Register with us: <br />
        <input type = "submit" name = "login" value = "Register" />
        <br />
    </form>
    <form enctype="multipart/form-data" action = "mainpage.php" method = "POST">
        Or continue as an unregistered user: <br />
        <input type = "submit" name = "login" value = "Continue as an unregistered user" />
        <br />
    </form>
</body>
</html>