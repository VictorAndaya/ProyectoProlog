<?php
function suma($request){

    
$sum=json_decode($request->getbody());
$primernumero=$sum->primernumero;
$segundonumero=$sum->segundonumero;


$respuesta=($primernumero+$segundonumero);
return json_encode($respuesta);

}
