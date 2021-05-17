<?php

  $nss = $_POST["codigo"];
  $nss2 = $nss;
  //echo $nss2."\n";
  if(strlen($nss2)>11){
    echo "EL NSS sobrepasa la cantidad de caracteres";
  }else if(strlen($nss2)==11){
    echo $nss2;
  }else{
    while(strlen($nss2)<11){
      $nss2 = "0".$nss2;
    }
    echo $nss2;
  }

?>
