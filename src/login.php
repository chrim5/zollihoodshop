<?php
session_start();
require_once("classes/user.class.php");

//User::createUser() to create a test user

$user = User::getUser($_POST["username"]);
if (password_verify($_POST["password"],$user->getPassword()))
{
    $_SESSION['username'] = $_POST["username"];
    header('Location: /' );
    die();
}
else
{
    echo "WRONG PASSWORD";
}

/* End of file filename.php */
