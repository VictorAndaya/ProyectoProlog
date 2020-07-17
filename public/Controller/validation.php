<?

function AccessLogin($request){

    $login=new Login();
    return $login->AccessLogin($request);
}

class Login{

    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function AccessLogin($request){

        $data=json_decode($request->getbody());
        $usuario = $data->usuario;
        $contrasena = $data->contrasena;
        $response;
        $sql = "SELECT * FROM Usuarios WHERE Usuario = :usuario AND Contrasena = :contrasena";
        try{   

            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":usuario",$usuario);
            $statement->bindParam(":contrasena",$contrasena);
            $statement->execute();
            $count=$statement->rowCount();
            
            if($count)
            {
                $response->mensaje="Acceso correcto";
            }
            else
            {
                $response->mensaje="Usuario/Contrasena incorrecta";
            }
              

        }catch(Exception $e){
            $response=$e;
        }
        
        return json_encode($response);
    }


    public function verificaSubmoduleService($query){
        $ch = curl_init();        
        
        $optArray = array(
            CURLOPT_URL =>$query->URL,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST=>$query->VERBO,
            CURLOPT_POSTFIELDS=>$query->DATA,
            CURLOPT_HTTPHEADER=>array('Content-type: text/plain'),
        );        
        curl_setopt_array($ch, $optArray);    
        $response=new stdClass();
        $response->body = curl_exec($ch);        
        $response->responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);  
        return $response;     
    }

    

}