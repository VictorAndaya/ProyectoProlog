<?
function triangulo($request){
    $datos=json_decode($request->getbody());

    $base=$datos->base;
    $altura=$datos->altura;

    $respuesta=(($base*$altura)/2);


    return json_encode($respuesta);

}