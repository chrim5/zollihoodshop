<?php
class User 
{
    public function index() {
        require APP . 'models/user.php';
        
        $User = new UserModel();
        $users = $User->getUsers();

        require APP . 'views/_templates/header.php';
        require APP . 'views/user/index.php';
        require APP . 'views/_templates/footer.php';
    }

    public function testsession() {
        Application::needsAdmin();
        session_start();
        var_dump($_SESSION);

        if ($_SESSION['admin'])
        {
            echo "he is admin";
        }
    }

    public function register() {
        require APP . 'views/_templates/header.php';
        require APP . 'views/user/register.php';
        require APP . 'views/_templates/footer.php';
    }

    public function create() {
        require APP . 'models/user.php';
        require_once APP . 'models/user.class.php';
        require  APP . 'utilities/sanitize.inc.php';

        $u = new UserObj();
        $u->email = sanitize_html_string($_POST["email"]);
        $u->username = sanitize_html_string($_POST["username"]);
        $u->firstname = sanitize_html_string($_POST["firstname"]);
        $u->lastname = sanitize_html_string($_POST["lastname"]);
        $u->savePassword($_POST["password"]);
    
        $User = new UserModel();
        $User->createNew($u);
        header('Location: /' );
    }

    public function update() {
        require APP . 'models/user.php';
        require_once APP . 'models/user.class.php';
        require  APP . 'utilities/sanitize.inc.php';

        $u = new UserObj();
        $u->email = sanitize_html_string($_POST["email"]);
        $u->username = sanitize_html_string($_POST["username"]);
        $u->firstname = sanitize_html_string($_POST["firstname"]);
        $u->lastname = sanitize_html_string($_POST["lastname"]);
        $u->savePassword($_POST["password"]);

        $User = new UserModel();
        $User->save($u);
        header('Location: /' );
    }

    public function login() {
        session_start();

        require APP . 'models/user.php';
        require  APP . 'utilities/sanitize.inc.php';
        
        $User = new UserModel();
        $user = $User->getUser(sanitize_sql_string($_POST['username']));
        if (password_verify(sanitize_sql_string($_POST['password']),$user->getPassword()))
        {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['firstname'] = $user->getFirstname();
            $_SESSION['lastname'] = $user->getLastname();
            $_SESSION['admin'] = $user->isAdmin();
            header('Location: /' );
            die();
        }
        else
        {
            echo "WRONG PASSWORD";
        }
    }

    public function logout() {
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
