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
          <a href = "login.php"> Login </a> 
          <a href = "register.php"> Register </a>
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
                $_SESSION['id_user'] = -1;
                $stmt = $mysqli->prepare("SELECT id, title, body FROM stories");
                if(!$stmt){
                    printf("Query Prep Failed: %s\n", $mysqli->error);
                }
                $res = $stmt->execute();
                if(!($res))
                {
                    printf("execute failed %s");
                }
                $resbind = $stmt->bind_result($userstoriesid, $userstoriestitle, $userstoriesbody);
                if(!($resbind))
                {
                    printf("bindres failed %s");
                }
                echo "<ul>\n";
                printf("<div class = 'storydisp'>");
                while($stmt->fetch())
                {
                        printf("<br />");
                        printf("\tStory ID: %s <br /> Story Title: %s <br />",
                            htmlspecialchars($userstoriesid), 
                            htmlspecialchars($userstoriestitle));

                        printf("Story Body: %s <br />",
                            htmlspecialchars($userstoriesbody));
                            printf("<br />");
                }
                printf("<form enctype = 'multipart/form-data' action = 'modifyComment.php' method = 'POST'>
                <br /> <input type = 'submit' name = 'viewCom' value = 'View Comments' formaction = 'viewComments.php'/> <br />
                </form>");
                
                printf("</div>");
                echo "</ul>\n";

                $stmt->close();
            ?>
        </div>
    </div>
</body>
</html>