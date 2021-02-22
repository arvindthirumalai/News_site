<!doctype HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Submit Story </title>
    <link href= "login.css" rel = "stylesheet"/>
</head>
<body>
<form enctype = "multipart/form-data" action = "verifySubmit.php" method = "POST">
        <p> Respectively, enter the story's title, content and link: </p>
        <input type = "text" name = "newsubmitStoryTitle" value = "Title" /> <br />
        <br />
        <input type = "text" name = "newsubmitStoryContent" value = "Content" /> <br />
        <br />
        <p> Link is optional: </p>
        <input type = "text" name = "newsubmitStoryLink" value = "" /> <br />
        <br />
        <input type = "submit" value = "Submit Story"/>
    </form>
</body>
</html>