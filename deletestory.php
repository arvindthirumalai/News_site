<!doctype HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "login.css" rel = "stylesheet"/>
    <title>Delete Story</title>
</head>
<body>
    <form enctype="multipart/form-data" action = "verifyDelete.php" method = "POST">
        <p> Enter the following information: (You can only delete your own stories) </p>
        <input type = "text" name = "deletestoryid" value = "ID of Story" />
        <br />
        <input type = "submit" name = "login" value = "Delete story" />
        <br />
        <input type="hidden" name="token" value="<?php session_start(); echo $_SESSION['token'];?>" />
    </form>
</body>
</html>