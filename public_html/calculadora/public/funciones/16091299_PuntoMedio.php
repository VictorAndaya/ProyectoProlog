<? 
function PuntoMedio($request)
{
    $datos=json_decode($request->getbody());

    $x1 = $datos->x1;
    $y1 = $datos->y1;
    $x2 = $datos->x2;
    $y2 = $datos->y2;

    $S1 = $x1 + $y1; 
    $S2 = $x2 + $y2; 

    $D1 = $S1/2; 
    $D2 = $S2/2; 

    $Punto->Punto = $D1; 
    $Punto2->Punto2 =$D2; 
    return json_encode($Punto);
   
}