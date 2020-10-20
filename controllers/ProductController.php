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
      
      public function findByText($txt)
      {
         return $this->model->findByText($txt);
      }
      
      public function list_user_products($iduser = '')
      {
         return $this->model->list_user_products($iduser);
      }
      
      public function list_user_deleted_products($iduser = '')
      {
         return $this->model->list_user_deleted_products($iduser);
      }
      
      public function add_product($product = '')
      {
         
         return $this->model->add_product($product);
      }
      
      public function get_product($product = '')
      {
         return $this->model->get_product($product);
      }
      
      public function get_image_product($product = '')
      {
         return $this->model->get_image_product($product);
      }
      
      public function update_product($product = '')
      {
         return $this->model->update_product($product);
      }
      
      public function delete_product($idproduct = '')
      {
         return $this->model->delete_product($idproduct);
      }
      
      public function validate_image($image)
      {
         
         $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
         //$tmp_dir = $_FILES['image']['tmp_name'];
         $imgSize = $_FILES['image']['size'];
         $imgExt = strtolower(pathinfo($image, PATHINFO_EXTENSION));
         
         if (in_array($imgExt, $valid_extensions)) {
            if ($imgSize < 100000) {
               $msg = 'ok';
            } else {
               $msg = "Su archivo es muy grande.";
            }
         } else {
            $msg = "Solo archivos JPG, JPEG, PNG & GIF son permitidos.";
         }
         return $msg;
      }
      
      
   }