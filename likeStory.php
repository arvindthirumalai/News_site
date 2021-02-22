<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Like Story</title>
    <link href= "login.css" rel = "stylesheet"/>
</head>
<body>
    <form enctype = "multipart/form-data" action = "verifyLike.php" method = "POST" >
        <p> Enter ID of story to like: </p>
        <input type = "text" name = "likestoryID" value = "StoryID" /> <br />
        <br />
        <input type = "submit" value = "Like Story" />
        <br />
        <input type="hidden" name="token" value="<?php session_start(); echo $_SESSION['token'];?>" />
    </form>
</body>
</html>