<?
function areacilindro($request){

$datos=json_decode($request->getbody());

$altura = $datos ->altura;
$radio= $datos ->radio;

$x = 2 * pi() * $radio;
$y = $radio + $altura;
$area = $x * $y;
return json_encode($area);
}
