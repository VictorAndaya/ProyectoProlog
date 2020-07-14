<?
function conversor($request){

$datos=json_decode($request->getbody());

$pesos = $datos ->pesos;
$dolar = 22.70;
$resultado = $pesos / $dolar;
return json_encode($resultado);
}