<?php


class SingleConnection extends PDO
{
      static private $dsn = 'mysql:host=kynosargos.com;dbname=kynosarg_vincula';
    static private $username = 'kynosarg_test';
    static private $hiddentext = 'Rr&Rgmvk4WRh';

    protected $rows = array();

    public function __construct()
    {
        try {
            parent::__construct(self::$dsn, self::$username, self::$hiddentext, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
            die("PDO CONNECTION ERROR: " . $e->getMessage());
        }


    }

}