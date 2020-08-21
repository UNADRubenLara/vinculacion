<?php
   
   use PHPUnit\Framework\TestCase;
   
   foreach (glob("../models/*.php") as $filename) {
      include_once $filename;
   }
   
   class ZipModelTest extends TestCase
   {
      
      public function testFindByCode()
      {
         $colonia = $this->mock();
         $model = new ZipModel();
         $RomaNorte = $model->findByCode('592');
         $this->assertEquals($colonia, $RomaNorte);
         
      }
      
      private function mock()
      {
         $colonia = array(
            'C_CODIGO' => '6700',
            'C_NOMBRE' => 'Roma Norte',
            'D_MUNICIPIO' => 'Cuauhtémoc',
            'D_ESTADO' => 'Ciudad de México',
            'D_CIUDAD' => 'Ciudad de México');
         return $colonia;
      }
   }
