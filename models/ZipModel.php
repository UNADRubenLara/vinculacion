<?php
   
   
   class ZipModel
   {
      public function __construct()
      {
         $this->connection = new SingleConnection();
      }
      
      public function findByCode($idZip)
      {
         if (!ctype_digit($idZip)) {
            exit;
         }
         $data = [];
         try {
            $stmt = $this->connection->prepare("select idADDRESS, C_CODIGO, C_NOMBRE, D_TIPOASENTAMIENTO, D_MUNICIPIO, D_ESTADO, D_CIUDAD  from ZP_ADDRESS where idADDRESS like :zip");
            $stmt->bindParam('zip', $idZip, PDO::PARAM_STR);
            $stmt->execute();
            $zip = $stmt->fetch(PDO::FETCH_ASSOC);
            $data = array('C_CODIGO' => $zip['C_CODIGO'], 'C_NOMBRE' => $zip['C_NOMBRE'], 'D_CIUDAD' => $zip['D_CIUDAD'], 'D_MUNICIPIO' => $zip['D_MUNICIPIO'], 'D_ESTADO' => $zip['D_ESTADO']);
         } catch (PDOException  $ex) {
            $this->connection->trow_error($ex);
         }
         if ($data) {
            return $data;
         } else {
            return 0;
         }
         
      }
      
      public function findByZip($zipCode)
      {
         
         if (!ctype_digit($zipCode)) {
            exit;
         }
         $data = [];
         try {
            $stmt = $this->connection->prepare("select idADDRESS, C_CODIGO, C_NOMBRE, D_TIPOASENTAMIENTO, D_MUNICIPIO, D_ESTADO, D_CIUDAD  from ZP_ADDRESS where C_CODIGO like :zip");
            $stmt->bindParam('zip', $zipCode, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchall();
            foreach ($data as $zip) {
               $colonia = array('idADDRESS' => $zip['idADDRESS'], 'C_NOMBRE' => $zip['C_NOMBRE'], 'D_MUNICIPIO' => $zip['D_MUNICIPIO'], 'D_ESTADO' => $zip['D_ESTADO']);
               array_push($data, $colonia);
            }
         } catch (PDOException  $ex) {
            $this->connection->trow_error($ex);
         }
         
         if ($data) {
            return $data;
         } else return 0;
         
      }
      
      
   }