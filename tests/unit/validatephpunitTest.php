<?php


use PHPUnit\Framework\TestCase;

class validatephpunitTest extends TestCase
{

    public function testSuma()
    {
        include_once '/xampp/htdocs/vinculacion/model/validatephpunit.php';
        $db =new validatephpunit(5);
        $obtenido=$db->duplicar();
        $expected=10;
        $this->assertEquals($obtenido,$expected);


    }

}

