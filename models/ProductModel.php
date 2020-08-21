<?php
   
   
   class ProductModel
   {
      private $list = array();
      
      public function __construct()
      {
         $this->connection = new SingleConnection();
         $this->list = $this->list_products();
      }
      
      public function list_products()
      {
         try {
            //
            $stmt = $this->connection->prepare("SELECT `idproduct_detail`, `idbranch`, `product_detail`, `idusuario` FROM `PRODUCT_DETAIL`");
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
      
      public function get_product($product)
      {
         try {
            $stmt = $this->connection->prepare("SELECT * FROM `PRODUCT_DETAIL` WHERE `idproduct_detail` = :p");
            $stmt->bindParam(':p', $product, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
         } catch (Exception $ex) {
            return $ex[2];
         }
         if ($data) {
            return $data;
         }
         return 0;
      }
      
      public function list_user_products($iduser = '')
      {
         try {
            $stmt = $this->connection->prepare("SELECT * FROM `PRODUCT_DETAIL` WHERE `idusuario` = :p");
            $stmt->bindParam(':p', $iduser, PDO::PARAM_STR);
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
      
      public function add_product($product)
      {
         $stmt = $this->connection->prepare("INSERT INTO `PRODUCT_DETAIL` (`idproduct_detail`, `idbranch`, `product_detail`, `idusuario`, `image`) VALUES (NULL, :b, :d, :u,:i)");
         $stmt->bindParam(':b', $product['idbranch'], PDO::PARAM_STR);
         $stmt->bindParam(':d', $product['product_detail'], PDO::PARAM_STR);
         $stmt->bindParam(':u', $product['iduser'], PDO::PARAM_STR);
         $stmt->bindParam(':i', $product['image'], PDO::PARAM_LOB);
         $stmt->execute();
         $data = array();
         return $data;
      }
      
      public function update_product($product)
      {
         $stmt = $this->connection->prepare("UPDATE `PRODUCT_DETAIL` SET `idbranch` = :b, `product_detail` = :d, `image`= :im  WHERE `PRODUCT_DETAIL`.`idproduct_detail` = :id AND `PRODUCT_DETAIL`.`idusuario` = :u;");
         $stmt->bindParam(':id', $product['idproduct_detail'], PDO::PARAM_STR);
         $stmt->bindParam(':d', $product['product_detail'], PDO::PARAM_STR);
         $stmt->bindParam(':b', $product['idbranch'], PDO::PARAM_STR);
         $stmt->bindParam(':u', $product['iduser'], PDO::PARAM_STR);
         $stmt->bindParam(':im', $product['image'], PDO::PARAM_LOB);
         $stmt->execute();
         $data = array();
         return $data;
      }
      
      public function delete_product($product)
      {
         $data = array();
         return $data;
      }
      
      public function product_add_image($product, $image)
      {
         $data = array();
         return $data;
      }
      
      private function getBranch($product)
      {
         $data = array();
         return $data;
      }
      
      
   }