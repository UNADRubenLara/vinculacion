<?php
   
   
   class StatsController
   {
      private $Accessmodel;
      private $Usersmodel;
      private $productmodel;
      private $messagemodel;
      
      public function __construct()
      {
         $this->Accessmodel = new AccessModel();
         $this->Usersmodel = new UsersModel();
         $this->productmodel = new ProductModel();
         $this->messagemodel = new MessageModel();
      }
      
      public function date_access($date_init, $date_end)
      {
         $rawdata = $this->Accessmodel->date_access($date_init, $date_end);
         return $this->newlist($rawdata);
         
      }
      
      
      public function data_product_users()
      {
         
         $rawdata = $this->productmodel->list_products();
         if ($rawdata) {
            $list = array();
            for ($i = 0; $i < count($rawdata); $i++) {
               $id = $rawdata[$i]['idusuario'];
               array_unshift($list, $id);
            }
            $cleardata = array_count_values($list);
         }
         return $this->newlist($cleardata);
      }
      
      
      public function messages($date_init, $date_end)
      {
         $rawdata = $this->messagemodel->list_messages($date_init, $date_end);
         $list = array();
         if ($rawdata) {
            for ($i = 0; $i < count($rawdata); $i++) {
               $id = $rawdata[$i]['idcliente'];
               $username = $this->Usersmodel->get_data_user($id);
               array_unshift($list, $username['username']);
            }
            return array_count_values($list);
         }
         return array_count_values($list);
      }
      
      private function newlist($rawdata)
      {
         $userlist = $this->Usersmodel->list_users();
         if ($rawdata) {
            foreach ($userlist as $keyuser => $varuser) {
               foreach ($rawdata as $keyaccess => $varaccess) {
                  if ($varuser['idusuario'] == $keyaccess) {
                     $username = $varuser['username'];
                     $newlist[$username] = $varaccess;
                  }
               }
            }
         }
         return $newlist;
      }
      
      public function messages_suceful($date_init, $date_end)
      {
         $rawdata = $this->messagemodel->list_messages($date_init, $date_end);
         $list = array();
         if ($rawdata) {
            for ($i = 0; $i < count($rawdata); $i++) {
               $id = $rawdata[$i]['idcliente'];
               array_unshift($list, $id);
            }
            return array_count_values($list);
         }
         
      }
      
      public function stats_messages($date_init, $date_end)
      {
         $rawdata = $this->messagemodel->list_messages($date_init, $date_end);
         $list = array();
         if ($rawdata) {
            for ($i = 0; $i < count($rawdata); $i++) {
               $id = $rawdata[$i]['success'];
               if ($id == null) {
                  $id = TXTEvaluatePending;
               }
               if ($id == '0') {
                  $id = TXTNotSuccessful;
               }
               if ($id == '1') {
                  $id = TXTSuccessful;
               }
               if ($id == '2') {
                  $id = TXTSuccessfulandcontract;
               }
               if ($id == '3') {
                  $id = TXTSuccessfulandprovider;
               }
               
               array_unshift($list, $id);
            }
            return array_count_values($list);
         }
      }
      
   }
   

   
      
      
      
   