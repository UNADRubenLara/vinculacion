<?php
   use PHPUnit\Framework\TestCase;
   foreach (glob("../models/*.php") as $filename)
   {
      include_once $filename;
   }
      class UsersModelTest extends TestCase
   {
         public function testGet_user()
      {
         $model=new UsersModel();
         $Admin_user=$model->get_user('admin');
         $this->assertEquals(1,$Admin_user['rol']);
       }
   }
