<?
function binomio($request){

    $datos=json_decode($request->getbody());

    $a=$datos->a;
    $b=$datos->b;

    $aa=$a*$a;
    $bb=$b*$b;
    $ab=2*($a*$b);
    
    $resp->a=$aa;
    $resp->ab=$ab;
    $resp->b=$bb;
    return json_encode($resp);
}