<?php


class SingleConnection extends PDO
{
    //production
    static private $dsn = 'mysql:host=kynosargos.com;dbname=kynosarg_vincula';
    static private $username = 'kynosarg_test';
    static private $hiddentext = 'Rr&Rgmvk4WRh';

    //dev
    /*
    static private $dsn = 'mysql:host=localhost;dbname=vinc2';
    static private $username = 'root';
    static private $hiddentext = '';*/


    protected $rows = array();

    public function __construct()
    {
        try {
            parent::__construct(self::$dsn, self::$username, self::$hiddentext, array(PDO::ATTR_PERSISTENT => true));
        } catch (PDOException $e) {
            die("PDO CONNECTION ERROR: " . $e->getMessage());
        }


    }

}