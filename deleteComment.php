<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "login.css" rel = "stylesheet"/>
    <title> Delete Comment </title>
</head>
<body>
    <form enctype = "multipart/form-data" action = "verifyDeleteComment.php" method = "POST">
        <p> Enter id of the comment you want to delete: </p>
        <input type = "text" name = "deleteCommentID" value = "Comment ID" /> <br />
        <br />
        <input type = "submit" value = "Delete Comment"/>
        <br />
        <input type="hidden" name="token" value="<?php session_start(); echo $_SESSION['token'];?>" />
    </form>
</body>
</html>