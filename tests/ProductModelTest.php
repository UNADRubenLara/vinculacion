<?php
   
   
   use PHPUnit\Framework\TestCase;
   foreach (glob("../models/*.php") as $filename) {
      include_once $filename;
   }
   class ProductModelTest extends TestCase
   {
   
      
      
      public function test__construct()
      {
         
         $model = new ProductModel();
         $lista=$model->list_products();
         
         $this->assertEquals(5, count($lista[0]));
         }
   }
