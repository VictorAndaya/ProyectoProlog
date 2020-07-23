<?
function getCarreraMateria($request){
    $carreras=new consulta();
return $carreras->getCarreraMateria($request);
}
class consulta{
    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function getCarreraMateria($request){
        $carreras;
        $response;
        $carrera=json_decode($request->getBody());
        $sql="SELECT * FROM CarreraMaterias WHERE IdCarrera=:IdCarrera AND IdMateria=:IdMateria";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdCarrera",$carrera->IdCarrera);
            $statement->bindParam("IdMateria",$carrera->IdMateria);
            $statement->execute();
            $count=$statement->rowCount();
            
            if($count)
            {
                $response->mensaje = 1;
            }
            else
            {
                $response->mensaje = 0;
            }         
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


}