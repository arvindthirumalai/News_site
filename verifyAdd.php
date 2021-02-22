<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Verify Add Comment</title>
    <link href= "login.css" rel = "stylesheet"/>
</head>
<body>
    <?php
        require 'database.php';
        session_start();
        $newaddcontent = $_POST['newaddCommentContent'];
        $newaddstoryID = (int) $_POST['newaddCommentStoryID'];
        $currentuserid = $_SESSION['id_user'];
        if(!hash_equals($_SESSION['token'], $_POST['token']))
        {
	        die("Request forgery detected");
        }
        $addstmt = $mysqli->prepare("INSERT into comments (content, comments.user_id, comments.story_id) values (?, ?, ?)");
        if(!$addstmt)
        {
            printf("insert query prep failure. %s", $mysqli->error);
            exit;
        }
        $checkBind = $addstmt->bind_param('sii', $newaddcontent, $currentuserid, $newaddstoryID);
        $checkExecute = $addstmt->execute();
        if( (!$checkBind) || (!$checkExecute))
        {
            printf("Make sure id value is accurate");
            $addstmt->close();
            exit;
        }
        else
        {
            $addstmt->close();
            printf(" <form enctype = 'multipart/form-data' action = 'homepage.php' method = 'POST'>
            <p> Added Comment Succesfully. Back to homepage? </p>
            <input type = 'submit' value = 'Back to Homepage' /> </form>");
            exit;
        }

    ?>
</body>
</html>