<?
function velocidad($request){

$data=json_decode($request->getbody());

 $distancia=$data->distancia;
 $tiempo=$data->tiempo;
 $x=$distancia/($tiempo);
 $v->velocidad=$x;

 
 return json_encode($v);
}