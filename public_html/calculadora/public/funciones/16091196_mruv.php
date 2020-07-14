<?
function mruv($request){

    $datos=json_decode($request->getbody());
    $operacion=$datos->operacion;

    $x0=$datos->x0;
    $y0=$datos->y0;
    $v0=$datos->v0;
    $a=$datos->a;
    $t=$datos->t;

    $vt=$v0*$t;
    $t2=$t*$t;
    $at2=(1/2*$a)*$t2;


    $xf=$x0+$vt+$at2;
    $yf=$y0+$vt+$at2;

    $respuesta ->xf=$xf;
    $respuesta ->yf=$yf;
    return json_encode($respuesta);
}
