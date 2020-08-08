<?php
   
   
   use PHPUnit\Framework\TestCase;
   
   foreach (glob("../models/*.php") as $filename) {
      include_once $filename;
   }
   
   class BranchModelTest extends TestCase
   {
      
      public function testFindByCode()
      {
         $branch = $this->mock();
         $model = new BranchModel();
         $Cultivo = $model->findByCode('1111');
         $this->assertEquals($branch, $Cultivo);
         
      }
      
      private function mock()
      {
         $branch = array(
            'branchText' => 'Cultivo de semillas oleaginosas, leguminosas y cereales',
            'b_description' => 'Unidades económicas dedicadas principalmente a la siembra y cultivo de semillas oleaginosas, como soya, cártamo, girasol, canola, ajonjolí, linaza; de leguminosas para grano, como frijol, garbanzo, lenteja, y de cereales, como trigo, maíz, arroz, sorgo.',
            'b_includes' => 'Incluye también: u.e.d.p. al cultivo de semillas oleaginosas o de leguminosas con la finalidad de cosechar la planta completa para aprovechamiento del ganado; al cultivo de sorgo escobero; unidades económicas que combinan el cultivo de diferentes semillas oleaginosas cuando sea imposible determinar cuál es la actividad principal; unidades económicas que combinan el cultivo de diferentes leguminosas para grano cuando sea imposible determinar cuál es la actividad principal, y unidades económicas que combinan el cultivo de diferentes cereales cuando sea imposible determinar cuál es la actividad principal.',
            'b_exclude' => 'Excluye: u.e.d.p. al cultivo de elote o maíz tierno; ejote, chícharo, haba cuya cosecha se realiza en verde (1112, Cultivo de hortalizas); a la producción de semillas mejoradas; al cultivo de algodón; de cacahuate; unidades económicas que combinan el cultivo de diferentes especies vegetales cuando sea imposible determinar cuál es la actividad principal; unidades económicas que combinan actividades agrícolas con explotación de animales cuando sea imposible determinar cuál es la actividad principal, y unidades económicas que combinan actividades agrícolas, explotación de animales y aprovechamiento forestal cuando sea imposible determinar cuál es la actividad principal (1119, Otros cultivos).');
         return $branch;
      }
   }
