<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Verify Login </title>
</head>
<body>
<?php
    require 'database.php';
    session_start();
    $uname = $_POST['username'];
    $user_password = $_POST['password'];
    $stmt = $mysqli->prepare("SELECT COUNT(*), id, hashed_password FROM user_info WHERE username=?");
    if(!$stmt)
    {
        printf("your life is a mess. %s", $mysqli->error);
        exit;
    }
    $stmt->bind_param('s', $uname);
    $stmt->execute();

    $res = $stmt->bind_result($count, $userid, $pwd);
    if(!$res)
    {
        printf($mysqli->error);
        exit;
    }
    $stmt->fetch();
    if($count == 1 && password_verify($user_password, $pwd))
    {
        $stmt->close();
        $_SESSION['id_user'] = $userid; 
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
        header("Location: homepage.php");
        exit;
    }
    else
    {
        printf("Login failed. Check password.");
        session_destroy();
        $stmt->close();
        exit;
    }
    
?>
</body>
</html>
