<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "login.css" rel = "stylesheet"/>
    <title> View Comments</title>
</head>
<body>
    <form enctype = "multipart/form-data" action = "verifyView.php" method = "POST">
        <p> Enter the id of the story whose comments you wish to view: </p>
        <input type = "text" name = "viewstoryID" value = "" /> <br />
        <br />
        <input type = "submit" value = "View Comments"/>
    </form>
</body>
</html>