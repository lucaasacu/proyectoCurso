<?php 
    if (!isset($PHP_AUTH_USER)) { 
      header('WWW-Authenticate: Basic realm="Acceso restringido"'); 
      header('HTTP/1.0 401 Unauthorized'); 
      echo 'Authorization Required.'; 
      exit; 
   } 
   else { 
      echo "Ha introducido el nombre de usuario: $PHP_AUTH_USER<br>"; 
      echo "Ha introducido la contraseña: $PHP_AUTH_PW<br>"; 
   } 
?> 

asdasdasd