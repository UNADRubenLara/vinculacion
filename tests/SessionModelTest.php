<?php
   
   
   use PHPUnit\Framework\TestCase;
   
   foreach (glob("../models/*.php") as $filename) {
      include_once $filename;
   }
   
   class SessionModelTest extends TestCase
   {
      
      public function testValidate_user()
      {
         $model = new SessionModel();
         $model->validate_user('admin', '123456');
         $this->assertEquals('Admin', $_SESSION['role']);
      }
   }
