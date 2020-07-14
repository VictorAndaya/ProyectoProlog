<?
function cuadrado($request){
    
    $datos=json_decode($request->getbody());

    $lado1=$datos->lado1;
    $lado2=$datos->lado2;

    $area->area = $lado1 * $lado2;

    return json_encode($area);
}