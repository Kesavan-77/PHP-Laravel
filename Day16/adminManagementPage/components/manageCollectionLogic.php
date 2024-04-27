<?php

require './myDB.php';

$cNameErr = 'max 10 characters';
$cDesErr = 'max 200 characters';

if(isset($_POST['add-collection'])){
    $collectionName = $_POST['c-name'];
    $collectionDescription = $_POST['c-des'];

    $validate = true;
    if(strlen(trim($collectionName))<=0){
        $cNameErr = "Provide valid name";
        $validate = false;
    }
    if($validate){
        $sql = "SELECT collection_name FROM collections where collection_name='$collectionName'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            $cNameErr = 'Collection name already available';
        }else{
            $insert = "INSERT INTO collections (
                collection_name,
                collection_description
                ) values('$collectionName','$collectionDescription')";
            $insert_value = mysqli_query($conn, $insert);
        }
    }
}

?>