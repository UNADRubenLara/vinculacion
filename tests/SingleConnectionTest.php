<?php
   
   
   use PHPUnit\Framework\TestCase;
   foreach (glob("../models/*.php") as $filename)
   {
      include_once $filename;
   }
   
   class SingleConnectionTest extends TestCase
   {
   
      public function test__construct()
      {
      $conn=new SingleConnection();
      $this->assertEquals('mysql' , $conn->getAttribute(PDO::ATTR_DRIVER_NAME));
      }
   }
