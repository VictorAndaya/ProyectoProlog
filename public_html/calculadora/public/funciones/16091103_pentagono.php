<?
function PentagonoRegularArea($request){
    
    $datos=json_decode($request->getbody());

    $longitud=$datos->longitud;

    $area->area = 1.72084 * ($longitud * $longitud);

    return json_encode($area);
}