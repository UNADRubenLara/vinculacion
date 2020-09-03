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
          $this->assertEquals(3, count($lista));
      }
      
      public function test_list_user_products()
      {
         $model = new ProductModel();
         $lista = $model->list_user_products('4');
          $this->assertEquals('1111', $lista['0']['idbranch']);
      }
      public function test_get_product()
      {
         $model = new ProductModel();
         $lista = $model->get_product('2');
         $this->assertEquals('5112', $lista["idbranch"]);
      }
      public function test_findByText(){
         $model = new ProductModel();
         $lista = $model->findByText('%deta%');
         var_dump($lista);
         $this->assertEquals('1', $lista[0]['idproduct_detail']);
         
      }
      
   }
