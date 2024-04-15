<?php

require './deposit.php';

if(isset($_POST['check'])){
    $acc_no_check = (string) ($_POST['acc_no_check']);
    if(!isset($_COOKIE[$acc_no_check])){
        echo "not available";
    }else{
        echo "$_COOKIE[$acc_no_check]";
    }
}

?>