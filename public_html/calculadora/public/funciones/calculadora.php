<?
function calculadora($request){
    
    $datos=json_decode($request->getbody());
    $operacion=$datos->operacion;

    $a=$datos->a;
    $b=$datos->b;
    $c=$datos->c;
 
    $b2=$b*$b;
    $C=4*$a*$c;
    $d=$b2-$C;
    $raiz=sqrt($d);

    $r1=$raiz-$b;
    $r2=-$raiz-$b;

    $div1=$r1/(2*$a);
    $x1=$div1;
    $div2=$r2/(2*$a);
    $x2=$div2;


    $respuesta->x1=$x1;
    $respuesta->x2=$x2;
    return json_encode($respuesta);

}

