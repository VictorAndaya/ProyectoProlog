<?
function fuerza($request){

$data=json_decode($request->getbody());

 $m=$data->m;
 $a=$data->a;
 $f=$m*$a;
 $resp->$fue=$f;

 
 return json_encode($resp);
}