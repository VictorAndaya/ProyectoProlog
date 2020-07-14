<?
function trapecio($request){
    $datos=json_decode($request->getbody());

    $bn=$datos->bn;
    $bm=$datos->bm;
    $h=$datos->h;

    $bas=$bn*$bm;
    $t1=$bas*$h;
    $r=($t1/2);

    return json_encode($r);

}