<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Verify View </title>
    <link href= "login.css" rel = "stylesheet"/>
</head>
<body>
    <div class = "commenttt">
    <?php
        require 'database.php';
        $commentstoryid = (int) $_POST['viewstoryID'];
        session_start();
        $commentslist = $mysqli->prepare("SELECT comments.id, comments.content FROM comments WHERE comments.story_id = ?");
        if(!$commentslist)
        {
            printf("Select Query Prepare Failure. %s", $mysqli->error);
            exit;
        }
        else
        {
            $checkbpview = $commentslist->bind_param('i', $commentstoryid);
            $checkexecview = $commentslist->execute();
            if(!($checkbpview && $checkexecview))
            {
                printf("Bind param or execute failed. %s", $mysqli->error);
                $commentslist->close();
                exit;
            }
            $commentslist->bind_result($commentsuser_id, $contentlist);
            $commentcount == 0;
            while($commentslist->fetch())
            {
                printf("<br /> Comment ID: %s <br /> Content: %s <br />", htmlspecialchars($commentsuser_id), htmlspecialchars($contentlist));
                $commentcount = $commentcount + 1;
            }
            if($commentcount == 0)
            {
                printf("No Comments for this Story <br />");
            }
            printf("</ul> \n");
            $commentslist->close();
            if($_SESSION['id_user'] == -1)
            {
                printf(" <form enctype = 'multipart/form-data' action = 'mainpage.php' method = 'POST'>
                <p> </p>
                <input type = 'submit' value = 'Homepage' /> </form>");
            }
            else
            {
                printf(" <form enctype = 'multipart/form-data' action = 'homepage.php' method = 'POST'>
                <p> </p>
                <input type = 'submit' value = 'Homepage' /> </form>");
            }
            exit;
        }
    
    ?>
    </div>
</body>
</html>