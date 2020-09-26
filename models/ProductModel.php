<?php
   
   
   class ProductModel
   {
      public function __construct()
      {
         $this->connection = new SingleConnection();
      }
      
      public function list_products()
      {
         try {
            $stmt = $this->connection->prepare("SELECT `idproduct_detail`, `idbranch`, `product_detail`, `idusuario` FROM `PRODUCT_DETAIL` WHERE `status` = 1");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
         } catch (PDOException  $ex) {
            $this->connection->trow_error($ex);
         }
         if ($data) {
            return $data;
         }
         return 0;
      }
      
      public function findByText($txt)
      {
         $user = $_SESSION['iduser'];
         try {
            $txt = '%' . $txt . '%';
            $stmt = $this->connection->prepare("SELECT `idproduct_detail`, `idbranch`, `product_detail`, `idusuario` FROM `PRODUCT_DETAIL` WHERE`PRODUCT_DETAIL`.`product_detail` LIKE :p AND `PRODUCT_DETAIL`.`idusuario` != :us AND `PRODUCT_DETAIL`.`status` = 1 ;");
            $stmt->bindParam(':us', $user, PDO::PARAM_STR);
            $stmt->bindParam(':p', $txt, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
         } catch (PDOException  $ex) {
            $this->connection->trow_error($ex);
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
         } catch (PDOException  $ex) {
            $this->connection->trow_error($ex);
         }
         if ($data) {
            return $data;
         }
         return 0;
      }
      
      public function get_image_product($product)
      {
         try {
            $stmt = $this->connection->prepare("SELECT `image` FROM `PRODUCT_DETAIL` WHERE `idproduct_detail` = :p");
            $stmt->bindParam(':p', $product, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
         } catch (PDOException  $ex) {
            $this->connection->trow_error($ex);
         }
         if ($data) {
            return $data;
         }
         return 0;
      }
      
      
      public function list_user_products($iduser = '')
      {
         try {
            $stmt = $this->connection->prepare("SELECT * FROM `PRODUCT_DETAIL` WHERE `idusuario` = :p AND `status` = 1");
            $stmt->bindParam(':p', $iduser, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
         } catch (PDOException  $ex) {
            $this->connection->trow_error($ex);
         }
         if ($data) {
            return $data;
         }
         return 0;
      }
      
      public function list_user_deleted_products($iduser = '')
      {
         try {
            $stmt = $this->connection->prepare("SELECT * FROM `PRODUCT_DETAIL` WHERE `idusuario` = :p AND `status` = 2");
            $stmt->bindParam(':p', $iduser, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
         } catch (PDOException  $ex) {
            $this->connection->trow_error($ex);
         }
         if ($data) {
            return $data;
         }
         return 0;
      }
      
      public function add_product($product)
      {
         try {
            $stmt = $this->connection->prepare("INSERT INTO `PRODUCT_DETAIL` (`idproduct_detail`, `idbranch`, `product_detail`, `idusuario`, `image`) VALUES (NULL, :b, :d, :u,:i)");
            $stmt->bindParam(':b', $product['idbranch'], PDO::PARAM_STR);
            $stmt->bindParam(':d', $product['product_detail'], PDO::PARAM_STR);
            $stmt->bindParam(':u', $product['iduser'], PDO::PARAM_STR);
            $stmt->bindParam(':i', $product['image'], PDO::PARAM_LOB);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
         } catch (PDOException  $ex) {
            $this->connection->trow_error($ex);
         }
         if ($data) {
            return $data;
         }
      }
      
      public function update_product($product)
      {
         try {
            
            
            $stmt = $this->connection->prepare("UPDATE `PRODUCT_DETAIL` SET `idbranch` = :b, `product_detail` = :d, `image`= :im  WHERE `PRODUCT_DETAIL`.`idproduct_detail` = :id AND `PRODUCT_DETAIL`.`idusuario` = :u;");
            $stmt->bindParam(':id', $product['idproduct_detail'], PDO::PARAM_STR);
            $stmt->bindParam(':d', $product['product_detail'], PDO::PARAM_STR);
            $stmt->bindParam(':b', $product['idbranch'], PDO::PARAM_STR);
            $stmt->bindParam(':u', $product['iduser'], PDO::PARAM_STR);
            $stmt->bindParam(':im', $product['image'], PDO::PARAM_LOB);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
         } catch (PDOException  $ex) {
            $this->connection->trow_error($ex);
         }
         if ($data) {
            return $data;
         }
      }
      
      public function delete_product($idproduct)
      {
         try {
            $stmt = $this->connection->prepare("UPDATE `PRODUCT_DETAIL` SET `status` = '2' WHERE `PRODUCT_DETAIL`.`idproduct_detail` =:id");
            $stmt->bindParam(':id', $idproduct, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
         } catch (PDOException  $ex) {
            $this->connection->trow_error($ex);
         }
         if ($data) {
            return $data;
         }
      }
      
      
   }