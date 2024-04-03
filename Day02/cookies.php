<?php
$key = "name";
$value = "Kesavan";
setcookie($key,$value,time()+3600,"/");
if(isset($_COOKIE[$key])){
    echo 'cookie has been updated, contains value'.$value."<br>";
}else{
    echo 'there is no cookie <br>';
}

//setcookie($key,$value,time()-3600,"/");

if(count($_COOKIE)>0){
    echo "cookies are enabled";
}else echo "cookies are disabled";
?>