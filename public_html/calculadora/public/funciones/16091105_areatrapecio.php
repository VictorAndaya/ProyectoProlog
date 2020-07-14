<?
function areatrapecio($request)
{
    $datos=json_decode($request->getbody());

    $c=$datos->c;
    $b=$datos->b;
    $a=$datos->a;

    $multiplicacion = $c*$b;
    $multiplicacion2 = $multiplicacion*$a;

    $resultado->Area = $multiplicacion2/(2);

    return json_encode($resultado);

}