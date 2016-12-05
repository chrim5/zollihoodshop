<?php
class Home 
{
    public function index()
    {
        require APP . 'views/_templates/header.php';
        require APP . 'views/home/index.php';
        require APP . 'views/_templates/footer.php';
    }
    public function exampleOne()
    {
        require APP . 'views/_templates/header.php';
        require APP . 'views/home/example_one.php';
        require APP . 'views/_templates/footer.php';
    }
    public function exampleTwo()
    {
        require APP . 'views/_templates/header.php';
        require APP . 'views/home/example_two.php';
        require APP . 'views/_templates/footer.php';
    }
}
