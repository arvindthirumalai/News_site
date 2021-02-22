<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "login.css" rel = "stylesheet"/>
    <title>Register</title>
</head>
<body>
    <form enctype="multipart/form-data" action = "verifyRegistration.php" method = "POST">
        <p> To Register, enter the following information: </p>
        <input type = "text" name = "first_name" value = "First Name" />
        <br />
        <input type = "text" name = "last_name" value = "Last Name" />
        <br />
        <input type = "text" name = "username" value = "Username" />
        <br />
        <input type = "password" name = "password" value = "password" />
        <br />
        <input type = "submit" name = "Register" value = "Register" />
        <br />
    </form>
    
</body>
</html>