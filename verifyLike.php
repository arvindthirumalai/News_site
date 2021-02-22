<!doctype HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Verify Like </title>
    <link href= "login.css" rel = "stylesheet"/>
</head>
<body>
    <?php 
        require 'database.php';
        session_start();
        $likeStoryID = (int) $_POST['likestoryID'];
        if(!hash_equals($_SESSION['token'], $_POST['token']))
        {
	        die("Request forgery detected");
        }
        $numlikes = $mysqli->prepare("SELECT stories.num_likes FROM stories WHERE stories.id=?");
        $numlikes->bind_param('i', $likeStoryID);
        $numlikes->execute();
        $numlikes->bind_result($num_storylikes);
        $numlikes->fetch();
        if($num_storylikes == null)
        {
            $addnum_likes = 1;
        }
        else
        {
            $addnum_likes = $num_storylikes + 1;
        }
        $numlikes->close();
        $newnumlikes = $mysqli->prepare("UPDATE stories SET stories.num_likes=? WHERE stories.id=?");
        $checkbplike = $newnumlikes->bind_param('ii', $addnum_likes, $likeStoryID);
        $checkexlike = $newnumlikes->execute();
        if(!($checkbplike && $checkexlike))
        {
            printf("Houston, we have a problem. %s", $mysqli->error);
            $newnumlikes->close();
            exit;
        }
        else
        {
            $newnumlikes->close();
            printf("<form enctype = 'multipart/form-data' action = 'homepage.php' method = 'POST'>
                <p> Liked Story Succesfully. Back to homepage? </p>
                <input type = 'submit' value = 'Back to Homepage' /> </form>");
                exit;
        }
    ?>
</body>
</html>