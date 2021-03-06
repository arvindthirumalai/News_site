<!doctype html>
<html>
  <head>
      <title> Simple News Site </title>
      <link href= "mainpage.css" type = "text/css" rel = "stylesheet"/>
  </head>
  <body>
      <div class = "header">
        <div class = "newssite">
            <a href = "something"> IMPORTANT NEWS </a>
        </div>
        <div class = "navigation">
          <a href = "logout.php"> Logout </a> 
          <a href = "submitstory.php"> Submit Stories</a>
          <a href = "modifystory.php"> Edit Stories </a>
          <a href = "deletestory.php"> Delete Stories </a>
          <a href = "changePassword.php"> Change Password </a>
        </div>
      </div>
    <div class = "Main">
        <div class = "backgroundimage">
            <img src = "https://secondary.oslis.org/learn-to-research/plan/plan-possible-sources/images-for-plan-possible-sources/newspaper/image" alt = "newsimage">
        </div>
        <div class = "stories">
            <?php
                require 'database.php';
                session_start();
                $stmt = $mysqli->prepare("SELECT id, title, body, link, num_likes FROM stories");
                if(!$stmt){
                    printf("Query Prep Failed: %s\n", $mysqli->error);
                }
                $res = $stmt->execute();
                if(!($res))
                {
                    printf("execute failed %s");
                }
                $resbind = $stmt->bind_result($userstoryid, $userstorytitle, $userstorybody, $userstorylink, $number_storylikes);
                if(!($resbind))
                {
                    printf("bindres failed %s");
                }
                echo "<ul>\n";
                printf("<div class = 'storydisp'>");
                while($stmt->fetch())
                {
                        printf("<br />");
                        printf("\tStory ID:\n %s <br /> Story Title: %s <br />",
                            htmlspecialchars($userstoryid), 
                            htmlspecialchars($userstorytitle));

                        printf("Story Body: %s <br />",
                            htmlspecialchars($userstorybody));
                        if($userstorylink != null)
                        {
                            printf("Link: %s <br />", htmlspecialchars($userstorylink));
                        }
                        if($number_storylikes == null)
                        {
                            $numdisp = 0;
                        }
                        else
                        {
                            $numdisp = $number_storylikes;
                        }
                        printf("Number of Likes: %s <br />", htmlspecialchars($numdisp));
                        printf("<br />");
                }
                printf("<form enctype = 'multipart/form-data' action = 'modifyComment.php' method = 'POST'>
                <br /> <input type = 'submit' name = 'viewCom' value = 'View Comments' formaction = 'viewComments.php'/>
                  <input type = 'submit' name = 'modifyCom' value = 'Modify a Comment' /> 
                  <input type = 'submit' name = 'addCom' value = 'Add a Comment' formaction = 'addComment.php' /> 
                  <input type = 'submit' name = 'deleteCom' value = 'Delete a Comment' formaction = 'deleteComment.php' />
                  <input type = 'submit' name = 'likeStory' value = 'Like a Story' formaction = 'likeStory.php' /> <br />
                  </form>");
                printf("</div>");
                echo "</ul>\n";

                $stmt->close();
            ?>
        </div>
    </div>
</body>
</html>