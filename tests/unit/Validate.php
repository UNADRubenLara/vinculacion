<?php
   
   class Validate
   {
      protected $entero1;
      
      public function __construct($entero1)
      {
         $this->entero1 = $entero1;
      }
      
      public function duplicar()
      {
         return $this->entero1 * 2;
      }
   }
