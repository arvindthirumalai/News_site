<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Verify Delete</title>
    <link href= "login.css" rel = "stylesheet"/>
</head>
<body>
<?php
    require 'database.php';
    session_start();
    $delstoryid = $_POST['deletestoryid'];
    $userdelid = $_SESSION['id_user'];
    if(!hash_equals($_SESSION['token'], $_POST['token'])){
	    die("Request forgery detected");
    }
    $delrequest = $mysqli->prepare("SELECT COUNT(*), stories.user_id FROM stories WHERE stories.id=?");
    if(!$delrequest)
    {
        printf("Query Failed. %s", $mysqli->error);
        $delrequest->close();
        exit;
    }
    $delrequest->bind_param('i', $delstoryid);
    $delrequest->execute();
    $delrequest->bind_result($existcount, $realauthorid);
    $delrequest->fetch();
    if($existcount != 1 || $realauthorid != $userdelid)
    {
        printf("Story doesn't exist or you do not have permission to delete this story.");
        printf("<br /> <form enctype = 'multipart/form-data' action = 'homepage.php' method = 'POST'>
            <input type = 'submit' value = 'Back to Homepage' />
        </form>");
        $delrequest->close();
        exit;
    }
    else
    {
        //delete comments before stories bc foreign key issues.
        $delrequest->close();
        $deletecomment = $mysqli->prepare("DELETE FROM comments WHERE comments.story_id = ?");
        if(!$deletecomment)
        {
            printf("Delete Comments Query Failed. %s", $mysqli->error);
            exit;
        }
        $deletingfailure1 = $deletecomment->bind_param('i', $delstoryid);
        $executefailure1 = $deletecomment->execute();
        $deletecomment->fetch();
        if((!($deletingfailure1)) || (!($executefailure1)))
        {
            printf("Bind_param comment or execute failure %s", $mysqli->error);
            $deletecomment->close();
            exit;
        }
        else
        {
            $deletecomment->close();
        }
        $deleting = $mysqli->prepare("DELETE FROM stories WHERE stories.id = ?");
        if(!$deleting)
        {
            printf("Delete Query Failed. %s", $mysqli->error);
            exit;
        }
        $deletingfailure = $deleting->bind_param('i', $delstoryid);
        $executefailure = $deleting->execute();
        if((!($deletingfailure)) || (!($executefailure)))
        {
            printf("Bind_param or execute failure %s", $mysqli->error);
            $deleting->close();
            exit;
        }
        else
        {
            $deleting->close();
            printf(" <form enctype = 'multipart/form-data' action = 'homepage.php' method = 'POST'>
            <p> Successfully Deleted!. Back to homepage. </p>
            <input type = 'submit' value = 'Back to Homepage' /> </form>");
            exit;
        }
    }
?>
</body>
</html>
