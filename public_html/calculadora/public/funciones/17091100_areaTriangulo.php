<?
function areaTriangilo($request){
    $datos=json_decode($request->getbody());

    $b=$datos->b;
    $h=$datos->h;
    
    $bas=$b*$h;
    $r=($bas/2);

    return json_encode($r);

}
