<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "login.css" rel = "stylesheet"/>
    <title> Verify Delete Comment </title>
</head>
<body>
     <?php
        //first make sure userid = authorid
        require 'database.php';
        session_start();
        $currentdeletecommuserid = $_SESSION['id_user'];
        $commenttobedeleted = (int) $_POST['deleteCommentID'];
        if(!hash_equals($_SESSION['token'], $_POST['token'])){
            die("Request forgery detected");
        }
        $deleteuserauth = $mysqli->prepare("SELECT count(*), comments.user_id FROM comments WHERE comments.id = ?");
        $deleteuserauth->bind_param('i', $commenttobedeleted);
        $deleteuserauth->execute();
        $deleteuserauth->bind_result($countone, $realauthoruserid);
        $deleteuserauth->fetch();
        if($countone != 1 || ($realauthoruserid != $currentdeletecommuserid))
        {
            $deleteuserauth->close();
            printf(" <form enctype = 'multipart/form-data' action = 'homepage.php' method = 'POST'>
            <p> Failed. Check permissions and ID number. Back to homepage? </p>
            <input type = 'submit' value = 'Back to Homepage' /> </form>");
            exit;
        }
        else
        {
            //now actually delete comment
            $deleteuserauth->close();
            $userdeleteComment = $mysqli->prepare("DELETE FROM comments WHERE comments.id = ?");
            $checkBindDel = $userdeleteComment->bind_param('i', $commenttobedeleted);
            $checkExecuteDel = $userdeleteComment->execute();
            if(!($checkBindDel && $checkExecuteDel))
            {
                printf("Error with Bindparam or Execute. %s", $mysqli->error);
                $userdeleteComment->close();
                exit;
            }
            else
            {
                $userdeleteComment->close();
                printf(" <form enctype = 'multipart/form-data' action = 'homepage.php' method = 'POST'>
                <p> Deleted Comment Succesfully. Back to homepage? </p>
                <input type = 'submit' value = 'Back to Homepage' /> </form>");
                exit;
            }
        }
     ?>
</body>
</html>