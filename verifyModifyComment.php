<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "login.css" rel = "stylesheet"/>
    <title> Verify Modify Comment </title>
</head>
<body>
     <?php
        //first make sure userid = authorid
        require 'database.php';
        session_start();
        $currentmodifycommuserid = $_SESSION['id_user'];
        $commenttobemodified = (int) $_POST['modifiedcommentid'];
        $newcommentcontent = $_POST['modifiedcommentcontent'];
        if(!hash_equals($_SESSION['token'], $_POST['token'])){
            die("Request forgery detected");
        }
        $modifyuserauth = $mysqli->prepare("SELECT comments.user_id FROM comments WHERE comments.id = ?");
        $checkbp = $modifyuserauth->bind_param('i', $commenttobemodified);
        $checkex = $modifyuserauth->execute();
        $modifyuserauth->bind_result($realauthorid);
        $modifyuserauth->fetch();
        if(($realauthorid != $currentmodifycommuserid))
        {
            $modifyuserauth->close();
            printf(" <form enctype = 'multipart/form-data' action = 'homepage.php' method = 'POST'>
            <p> Failed. Check permissions and ID number. Back to homepage? </p>
            <input type = 'submit' value = 'Back to Homepage' /> </form>");
            exit;
        }
        else
        {
            //now actually modify comment
            $modifyuserauth->close();
            $usermodifyComment = $mysqli->prepare("UPDATE comments set comments.content=? WHERE comments.id=?");
            $checkBindMod = $usermodifyComment->bind_param('si', $newcommentcontent, $commenttobemodified);
            $checkExecuteMod = $usermodifyComment->execute();
            $usermodifyComment->close();
            if(!($checkBindMod && $checkExecuteMod))
            {
                printf("Error with Bind_param or execute. %s", $mysqli->error);
                
                exit;
            }
            else
            {
                printf("<form enctype = 'multipart/form-data' action = 'homepage.php' method = 'POST'>
                <p> Modified Comment Succesfully. Back to homepage? </p>
                <input type = 'submit' value = 'Back to Homepage' /> </form>");
                exit;
            }
        }
     ?>
</body>
</html>