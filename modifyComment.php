<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "login.css" rel = "stylesheet"/>
    <title> Modify Comment </title>
</head>
<body>
    <form enctype = "multipart/form-data" action = "verifyModifyComment.php" method = "POST">
        <p> Enter modified title, content and id of the comment to be modified: </p>
        <input type = "text" name = "modifiedcommentcontent" value = "Modify content" /> <br />
        <br />
        <input type = "text" name = "modifiedcommentid" value = "ID of Comment" /> <br />
        <br />
        <input type = "submit" value = "Modify Comment"/>
    </form>
</body>
</html>