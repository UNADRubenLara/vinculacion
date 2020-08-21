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
         $lista = $model->list_products();
         
         $this->assertEquals(5, count($lista[0]));
      }
      
      public function test_list_user_products()
      {
         $model = new ProductModel();
         $lista = $model->list_user_products('4');
         var_dump($lista);
         $this->assertEquals('1111', $lista['0']['idbranch']);
      }
      public function test_get_product()
      {
         $model = new ProductModel();
         $lista = $model->get_product('3');
         $this->assertEquals('5112', $lista["idbranch"]);
      }
      
   }
