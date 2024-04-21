<?php
$fileName = "../envs/".$email."Records.txt";
$acc_name_to_delete = $_POST['account_name_delete'];
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

?>
