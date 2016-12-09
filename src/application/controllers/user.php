<?php
class User 
{
    public function index()
    {
        require APP . 'models/user.php';
        
        $User = new UserModel();
        $users = $User->getUsers();

        require APP . 'views/_templates/header.php';
        require APP . 'views/user/index.php';
        require APP . 'views/_templates/footer.php';
    }

    public function register()
    {
        require APP . 'models/user.php';
        
        $User = new UserModel();
        $users = $User->getUsers();

        require APP . 'views/_templates/header.php';
        require APP . 'views/user/register.php';
        require APP . 'views/_templates/footer.php';
    }

    public function login()
    {
        session_start();

        require APP . 'models/user.php';
        
        $User = new UserModel();
        $user = $User->getUser($_POST["username"]);
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

    }

    public function logout()
    {
        session_start();

        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"],
                $params["domain"], $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header('Location: /' );
        die();
    }
}
