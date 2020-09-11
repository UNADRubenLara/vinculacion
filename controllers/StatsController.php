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
         $this->productmodel=new ProductModel();
         $this->messagemodel=new MessageModel();
      }
      public function date_access($date_init, $date_end){
         $rawdata=$this->Accessmodel->date_access($date_init, $date_end);
         $userlist=$this->Usersmodel->list_users();
         $newlist=array();
         if ($rawdata){
            foreach ($userlist as $keyuser=>$varuser){
               foreach ($rawdata as $keyaccess=>$varaccess){
                  if ($varuser['idusuario']==$keyaccess){
                     $username=$varuser['username'];
                     $newlist[$username]=$varaccess;
                  }
               }
            }
            return $newlist;
         }
      }
      public function data_product_users(){
         
         $rawdata=$this->productmodel->list_products();
          if ($rawdata) {
            $list=array();
            for($i=0; $i<count($rawdata); $i++)
            {
               $id=$rawdata[$i]['idusuario'];
               array_unshift($list,$id);
            }
           $cleardata=array_count_values($list);
         $userlist=$this->Usersmodel->list_users();
         $newlist=array();
         if ($cleardata){
            foreach ($userlist as $keyuser=>$varuser){
               foreach ($cleardata as $keyaccess=>$varaccess){
                  if ($varuser['idusuario']==$keyaccess){
                     $username=$varuser['username'];
                     $newlist[$username]=$varaccess;
                  }
               }
            }
            return $newlist;
         }
          }
      }
      
         public function messages($date_init, $date_end){
         $rawdata=$this->messagemodel->list_messages($date_init, $date_end);
         $list=array();
         if ($rawdata){
         for($i=0; $i<count($rawdata); $i++)
         {
            $id=$rawdata[$i]['idcliente'];
            array_unshift($list,$id);
         }
         return array_count_values($list);
      }
      }
      
      public function messages_suceful($date_init, $date_end){
         $rawdata=$this->messagemodel->list_messages($date_init, $date_end);
         $list=array();
         if ($rawdata){
         for($i=0; $i<count($rawdata); $i++)
         {
            $id=$rawdata[$i]['idcliente'];
            array_unshift($list,$id);
         }
         return array_count_values($list);
      }}
   }

   
      
      
      
   