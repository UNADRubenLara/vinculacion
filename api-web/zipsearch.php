<?Php
include_once "publicconection.php";
 if(!isset($dbo)){
$dbo=new PublicConecction();
}
$in=$_GET['txt'];
if(!ctype_digit ($in)){
    echo "Data Error";
    exit;
}

if(strlen($in)>3 and strlen($in) <9 )
{
    try {
        $sql="select idADDRESS, C_CODIGO, C_NOMBRE, D_TIPOASENTAMIENTO, D_MUNICIPIO, D_ESTADO, D_CIUDAD  from ZP_ADDRESS where C_CODIGO like '$in%'";
        $data = [];
        foreach ($dbo->query($sql) as $nt){
            $colonia=array('idADDRESS' => $nt['idADDRESS'],'C_NOMBRE' =>$nt['C_NOMBRE'] ,'D_MUNICIPIO' => $nt['D_MUNICIPIO'],'D_ESTADO' =>$nt['D_ESTADO'] );
            array_push($data,$colonia);
        }
    } catch (Exception $e) {

    }

}
if ($data) {echo json_encode($data);}
else{ echo "";}

$dbo=Null;
exit();