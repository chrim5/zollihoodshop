<?php
class Contact {
    public function index()
    {
        require APP . 'views/_templates/header.php';
        require APP . 'views/contact/index.php';
        require APP . 'views/_templates/footer.php';
    }
}