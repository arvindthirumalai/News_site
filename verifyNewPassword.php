<!DOCTYPE HTML> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Verify Changed Password </title>
    <link href= "login.css" rel = "stylesheet"/>
</head>
<body>
    <?php
        require 'database.php';
        session_start();
        $newpassworduser = $_POST['new_userpassword'];
        if(!hash_equals($_SESSION['token'], $_POST['token']))
        {
	        die("Request forgery detected");
        }
        if($newpassworduser == "")
        {
            printf("Password cannot be an empty string");
            exit;
        }
        else
        {
            $newp = $mysqli->prepare("UPDATE user_info set hashed_password=? WHERE user_info.id = ?");
            $hashedpasswd = password_hash($newpassworduser, PASSWORD_DEFAULT);
            $userinfoid = $_SESSION['id_user'];
            $b = $newp->bind_param('si',$hashedpasswd, $userinfoid);
            $e = $newp->execute();
            if(!($b & $e))
            {
                printf("Houston, we have a problem. %s", $mysqli->error);
                $newp->close();
                exit;
            }
            $newp->close();
            printf("<br /> <form enctype = 'multipart/form-data' action = 'login.php' method = 'POST' >
            <p> Password changed succesfully! Login with new credentials. </p>    
            <input type = 'submit' value = 'Login' /> </form>");
            exit;
        }
    ?>
</body>
</html>