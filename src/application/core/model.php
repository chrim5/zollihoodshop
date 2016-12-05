<?php
/**
 * This is the "base controller class". All other "real" controllers extend this class.
 */
class Model
{
    public $db = null;

    function __construct()
    {
        require APP . '/db/db.php';
        $this->db = DB::getInstance()->getConnection();
    }
}
