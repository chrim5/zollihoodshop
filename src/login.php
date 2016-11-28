<?php

require_once("classes/user.class.php");

//User::createUser() to create a test user

$user = User::getUser($_POST["username"]);
if (password_verify($_POST["password"],$user->getPassword()))
{
    echo "GOOD PASSWORD";
}
else
{
    echo "WRONG PASSWORD";
}

/* End of file filename.php */
