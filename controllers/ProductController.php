<?php
   
   
   class ProductController
   {
      private $model;
      
      public function __construct()
      {
         $this->model = new ProductModel();
         
      }
      
      public function list_products()
      {
         return $this->model->list_products();
      }
      
      public function add_product($product)
      {
         
         return $this->model->add_product($product);
      }
      
      public function update_product($product)
      {
         return $this->model->update_product($product);
      }
      
      public function delete_product($product)
      {
         return $this->model->delete_product($product);
      }
      public function add_($product, $image){
         return $this->model->product_add_image($product, $image);
      }
      
      
   }