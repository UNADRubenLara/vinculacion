<?php
   
   
   class ProductModel
   {
      private $list = array();
      
      public function __construct()
      {
         $this->connection = new SingleConnection();
         $this->list=$this->list_products();
      }
      public function get_product(){
      
      }
      public function list_products(){
         try {
            $stmt = $this->connection->prepare("SELECT * FROM PRODUCT_DETAIL");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
         } catch (Exception $ex) {
            return $ex[2];
         }
         if ($data) {
            return $data;
         }
         return 0;
      }
      
      public function add_product($product){
      $data=array();
      return $data;
      }
      public function update_product($product){
         $data=array();
         return $data;
      }
      public function delete_product($product){
         $data=array();
         return $data;
      }
      private function getBranch($product){
         $data=array();
         return $data;
      }
      
      public function product_add_image($product,$image){
         $data=array();
         return $data;
      }
      
      
      
   }