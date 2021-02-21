<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration Verification </title>
</head>
<body>
<?php
    require 'database.php';
     ini_set('display_errors', 1);
     error_reporting(E_ALL);
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $uname = $_POST["username"];
    $user_password = $_POST['password'];
    if($uname != "" && $user_password != "")
    {
        $register = $mysqli->prepare("INSERT INTO user_info (username, hashed_password, first_name, last_name) VALUES (?, ?, ?, ?)");
        $hashed_p = password_hash($user_password, PASSWORD_DEFAULT);
        if(!($register))
        {
            printf("Query Prep Failed REGISTER %s",$mysqli->error);
            exit;
        }
        $bind = $register->bind_param('ssss', $uname, $hashed_p,$firstName,$lastName);
        $reg = $register->execute();
        if(!$reg || !$bind)
        {
            printf("I suck at this. %s", $register->error);
            exit;
        }
        $register->close();
        echo("\n\t");
        printf("Registration Succesfu!");
    }
    else
    {
        printf("Invalid Credentials!");
        printf("<br /> <form enctype = 'multipart/form-data' action = 'register.php' method = 'POST' >
        <input type = 'submit' value = 'Back to Registration page' /> </form>");
        exit;
    }
?>
<div class = "RegistrationSuccess">>
    <form enctype="multipart/form-data" action = "login.php" method = "POST">
        <input type = "submit" value = "Login with new credentials" />
    </form>
</div>
</body>
</html>
