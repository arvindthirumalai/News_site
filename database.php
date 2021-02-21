<?php
    $mysqli = new mysqli('localhost', 'websiteuser', 'userpassword', 'newssite');

    if($mysqli->connect_errno)
    {
        printf("Connection Failed: %s\n", $mysqli->connect_error);
        exit;
    }
?>