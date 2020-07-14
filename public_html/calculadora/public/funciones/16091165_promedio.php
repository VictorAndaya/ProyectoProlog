<?php

function promedio($request){
    
    $info=json_decode($request->getbody());

    $cal1=$info->cal1;
    $cal2=$info->cal2;
    $cal3=$info->cal3;

    $respuesta=(($cal1+$cal2+$cal3)/3);

    return json_encode($respuesta);

}
