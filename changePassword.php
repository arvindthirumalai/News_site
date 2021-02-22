<!doctype HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Account Information </title>
    <link href= "login.css" rel = "stylesheet"/>
</head>
<body>
    <form enctype = "multipart/form-data" action = "verifyNewPassword.php" method = "POST">
        <p> Enter New Password: </p>
        <input type = "password" value = "" name = "new_userpassword" /> <br />
        <br />
        <input type = "submit" value = "Change Password" /> <br />
        <input type="hidden" name="token" value="<?php session_start(); echo $_SESSION['token'];?>" />
    </form>
</body>
</html>