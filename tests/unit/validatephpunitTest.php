<?php


use PHPUnit\Framework\TestCase;
//include_once '/xampp/htdocs/vinculacion/models/validatephpunit.php';
class validatephpunitTest extends TestCase
{

    public function testSuma()
    {

        $db =new validatephpunit(5);
        $obtenido=$db->duplicar();
        $expected=10;
        $this->assertEquals($obtenido,$expected);


    }

}

