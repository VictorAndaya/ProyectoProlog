<?
function gravedad($request){
$datos=json_decode($request->getbody());
   // $operacion=$w->operacion;

    $m1=$datos->m1;
    $m2=$datos->m2;
    $d=$datos->d;
    $mt=$m1*$m2;
    $dt=pow($d,2);
   $dtt=$mt/$dt;
    $g=$dtt*9.81;
    $gt=$g;
    $respuesta->gt=$gt;

    
    return json_encode($respuesta);

}