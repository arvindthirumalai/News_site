<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "login.css" rel = "stylesheet"/>
    <title> Add Comment </title>
</head>
<body>
    <form enctype = "multipart/form-data" action = "verifyAdd.php" method = "POST">
        <p> Enter the content of the new comment and the id of the comment's story, respectively. </p>
        <input type = "text" name = "newaddCommentContent" value = "Add content" /> <br />
        <br />
        <input type = "text" name = "newaddCommentStoryID" value = "ID of story" /> <br />
        <br />
        <input type = "submit" value = "Add Comment"/>
    </form>
</body>
</html>