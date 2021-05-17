<?php
  define('DB_SERVER','localhost');
  define('DB_USERNAME','apacheuser');
  define('DB_PASSWORD','Http2021!');
  define('DB_NAME', 'gpi');

  $link =mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  !mysqli_set_charset($link, "utf8");
  if(!$link){
    echo "No sé pudo conectar con la Base de Datos";
  }
?>
