<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Verify Submit </title>
    <link href= "login.css" rel = "stylesheet"/>
</head>
<body>
    <?php
        require 'database.php';
        session_start();
        $currentUser = $_SESSION['id_user'];
        $newsubmitstorytitle = $_POST['newsubmitStoryTitle'];
        $newsubmitstorycontent = $_POST['newsubmitStoryContent'];
        $newsubmitstorylink = $_POST['newsubmitStoryLink'];
        if($newsubmitstorylink == "")
        {
            $newsubmitstorylink = null;
        }
        if($newsubmitstorytitle == "" || $newsubmitstorycontent == "")
        {
            printf(" <form enctype = 'multipart/form-data' action = 'homepage.php' method = 'POST'>
                <p> Neither title nor content should be empty </p>
                <input type = 'submit' value = 'Homepage' /> </form>");
            exit;
        }
        $submit = $mysqli->prepare("INSERT INTO stories (title, body, link, stories.user_id) values (?,?,?,?)");
        if(!$submit)
        {
            printf("Error preparing insert query. %s", $mysqli->error);
            exit;
        }
        $cbp = $submit->bind_param('sssi', $newsubmitstorytitle, $newsubmitstorycontent, $newsubmitstorylink, $currentUser);
        $cexec = $submit->execute();
        if(!($cbp && $cexec))
        {
            printf("Houston, we have a problem. %s", $mysqli->error);
            $submit->close();
            exit;
        }
        else
        {
            printf(" <form enctype = 'multipart/form-data' action = 'homepage.php' method = 'POST'>
                <p> Story successfully added! </p>
                <input type = 'submit' value = 'Homepage' /> </form>");
        }
        
    ?>
</body>
</html>