<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "login.css" rel = "stylesheet"/>
    <title> Logout </title>
</head>
<body>
    <?php
        session_destroy();
    ?>
    <form action = "login.php" method = "GET">
    <p> You have succesfully logged out. </p>
        <input type = "submit" value = "Back to Login Page" />
    </form>
</body>
</html>