<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Modify Story </title>
    <link href= "login.css" rel = "stylesheet"/>
</head>
<body>
    <form enctype = "multipart/form-data" action = "verifyModifyStory.php" method = "POST">
        <p> Enter id of story to be modified, the new title, new content and new link: </p>
        <input type = "text" name = "modifiedstorytitle" value = "Modified Title" /> <br />
        <br />
        <input type = "text" name = "modifiedstorycontent" value = "Modified Content" /> <br />
        <br />
        <p> Link is optional: </p>
        <input type = "text" name = "modifiedstorylink" value = "Modified Link" /> <br />
        <br />
        <input type = "text" name = "tobemodifiedstoryid" value = "Story ID" /> <br />
        <br />
        <input type = "submit" value = "Modify Story"/>
        <input type="hidden" name="token" value="<?php session_start(); echo $_SESSION['token'];?>" />
    </form>
</body>
</html>