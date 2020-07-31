<?php
   
   
   use PHPUnit\Framework\TestCase;
   
   include_once 'C:\xampp\htdocs\vinculacion\tests\unit\Validate.php';
   
   class ValidateTest extends TestCase
   {
      
      public function testSuma()
      {
         
         $db = new Validate(5);
         $obtenido = $db->duplicar();
         $expected = 10;
         $this->assertEquals($obtenido, $expected);
         
         
      }
      
   }

