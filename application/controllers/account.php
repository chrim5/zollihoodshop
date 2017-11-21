<?php
class Account
{
    public function index()
    {
        require APP . 'models/user.php';

        session_start();
        $User = new UserModel();
        $user = $User->getUser($_SESSION['username']);

        require APP . 'views/_templates/header.php';
        require APP . 'views/account/index.php';
        require APP . 'views/_templates/footer.php';
    }
}