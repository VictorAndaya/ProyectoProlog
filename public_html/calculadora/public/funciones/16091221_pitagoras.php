<?
function pitagoras($request){

$data=json_decode($request->getbody());

 $a=$data->a;
 $b=$data->b;
 $a2=$a*$a;
 $b2=$b*$b;
 $c2=$a2+$b2;
 $c=sqrt($c2);
 $respuesta->hipotenusa=$c;

 
 return json_encode($respuesta);
}
