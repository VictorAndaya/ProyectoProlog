<?

function distancia($request){
    $datos = json_decode($request->getbody());
    
    $x1 = $datos->x1;
    $y1 = $datos->y1;
    $x2 = $datos->x2;
    $y2 = $datos->y2;

    $a1 = $x2-$x1;
    $a2 = $y2-$y1;

    $b1 = $a1*$a1;
    $b2 = $a2*$a2;


    $dist->distancia = sqrt($b1+$b2);

    return json_encode($dist);
}