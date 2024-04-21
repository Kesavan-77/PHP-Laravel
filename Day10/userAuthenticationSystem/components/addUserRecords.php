<?php

$addNameErr = '';
$addPassErr = '';

function AddAccountNameValid($val,&$valid){
    if(strlen(trim($val))<1){
        $GLOBALS['addNameErr'] = "Enter a account valid name";
        $valid = false;
    }
}

function AddPassValid($val,&$valid){
    if(strlen(trim($val))<1){
        $GLOBALS['addPassErr'] = "Enter a valid password";
        $valid = false;
    }
}

if(isset($_POST['addField'])){
    $acc_name_add = $_POST['account_name_add'];
    $pass_add = $_POST['password_add'];
    $valid = true;
    AddAccountNameValid($acc_name_add,$valid);
    AddPassValid($pass_add,$valid);

    if($valid){

        $fileName = "../envs/".$email."Records.txt";
        $acc_name_to_delete = $acc_name_add;
        $file = fopen($fileName, "r");
        $newFileContents = '';
        while(!feof($file)) {
            $line = fgets($file);
            $record = json_decode($line, true);
            if ($record['acc_name'] !== $acc_name_to_delete) {
                $newFileContents .= $line;
            }
        }
        fclose($file);
        $file = fopen($fileName, "w");
        fwrite($file, $newFileContents);
        fclose($file);

        $myFile = fopen("../envs/".$email."Records.txt","a+");
        $userRecord = array("acc_name"=> $acc_name_add, "password"=> $pass_add);
        $userRecordJSON = json_encode($userRecord);
        fwrite($myFile,$userRecordJSON);
        fwrite($myFile,"\n");
        fclose($myFile);
    }
}

?>