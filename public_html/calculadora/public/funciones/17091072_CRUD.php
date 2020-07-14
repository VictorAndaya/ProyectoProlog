<?
function gettodoslosproductos(){
    $productos=new Producto();
return $productos->getProductos();
}
function getproducto($request){
    $productos=new Producto();
return $productos->getProducto($request);
}
function setproducto($request){
    $productos=new Producto();
return $productos->setProducto($request);
}
class Producto{

    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function getProductos(){
        $productos;
        $response;
        $sql="SELECT * FROM productos;";    
        try{            
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function getProducto($request){
        $productos;
        $response;
        $producto=json_decode($request->getBody());
        $sql="SELECT * FROM productos WHERE id=:id";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("id",$producto->id);
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function setProducto($request){
        $productos;
        $response;
        $producto=json_decode($request->getBody());
        $sql="INSERT INTO productos(id,marca,nombre,cantidad,precio_por_unidad,llegada,caducidad) VALUES(:id,:marca,:nombre,:cantidad,:precio_por_unidad,:llegada,:caducidad)";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("id",$producto->id);
            $statement->bindParam("marca",$producto->marca);
            $statement->bindParam("nombre",$producto->nombre);
            $statement->bindParam("cantidad",$producto->cantidad);
            $statement->bindParam("precio_por_unidad",$producto->precio_por_unidad);
            $statement->bindParam("llegada",$producto->llegada);
            $statement->bindParam("caducidad",$producto->caducidad);
            $statement->execute();
            $response->mensaje="El producto se inserto Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


}