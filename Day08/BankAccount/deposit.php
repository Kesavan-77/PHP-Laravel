<?php
if(isset($_POST['deposit'])){
    $acc_no = (string) ($_POST['acc_no']);
    $amount = $_POST['amount'];
    if(!isset($_COOKIE[$acc_no])){
        setcookie($acc_no, $amount, time() + (86400 * 30), "/");
    }else{
        $temp = $_COOKIE[$acc_no] + $amount;
        setcookie($acc_no, $temp, time() + (86400 * 30), "/");
    }
}
?>
