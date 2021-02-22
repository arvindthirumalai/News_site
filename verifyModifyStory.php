<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Modify Story </title>
    <link href= "login.css" rel = "stylesheet"/>
</head>
<body>
    <?php
        require 'database.php';
        session_start();
        $tobemodifiedStoryID = (int) $_POST['tobemodifiedstoryid'];
        $currUserModID = $_SESSION['id_user'];
        $modifiedStoryTitle = $_POST['modifiedstorytitle'];
        $modifiedStoryContent = $_POST['modifiedstorycontent'];
        $modifiedStoryLink = $_POST['modifiedstorylink'];
        $modifiedStory = $mysqli->prepare("SELECT stories.user_id FROM stories WHERE stories.id = ?");
        $chbp = $modifiedStory->bind_param('i', $tobemodifiedStoryID);
        $chex = $modifiedStory->execute();
        if(!($chbp && $chex))
        {
            printf("Error modify story bp or ex. %s", $mysqli->error);
            $modifiedStory->close();
            exit;
        }
        $modifiedStory->bind_result($realstoryauthorid);
        $modifiedStory->fetch();
        if(($realstoryauthorid != $currUserModID))
        {
            $modifiedStory->close();
            printf(" <form enctype = 'multipart/form-data' action = 'homepage.php' method = 'POST'>
            <p> Failed. Check permissions and ID number. Back to homepage? </p>
            <input type = 'submit' value = 'Back to Homepage' /> </form>");
            exit;
        }
        else
        {
            //now actually modify story
            $modifiedStory->close();

            $usermodifyStory = $mysqli->prepare("UPDATE stories set stories.title=?, stories.link=?, stories.body=? WHERE stories.id=?");
            $checkBindModStory = $usermodifyStory->bind_param('sssi', $modifiedStoryTitle, $modifiedStoryLink, $modifiedStoryContent, $tobemodifiedStoryID);
            $checkExecuteModStory = $usermodifyStory->execute();
            $usermodifyStory->close();
            if(!($checkBindModStory && $checkExecuteModStory))
            {
                printf("Houston, we have a problem. %s", $mysqli->error);
                exit;
            }
            else
            {
                printf("<form enctype = 'multipart/form-data' action = 'homepage.php' method = 'POST'>
                <p> Modified Story Succesfully. Back to homepage? </p>
                <input type = 'submit' value = 'Back to Homepage' /> </form>");
                exit;
            }
        }
    
    ?>
</body>
</html>