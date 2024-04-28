<?php

require './myDB.php';

$cNameErr = 'max 10 characters';
$cDesErr = 'max 200 characters';
$updateNameErr = 'max 10 characters';

if (isset($_POST['add-collection'])) {
    $collectionName = $_POST['c-name'];
    $collectionDescription = $_POST['c-des'];

    $validate = true;
    if (strlen(trim($collectionName)) <= 0) {
        $cNameErr = "Provide valid name";
        $validate = false;
    }
    if (strlen(trim($collectionDescription)) <= 0) {
        $cDesErr = "Provide valid description";
        $validate = false;
    }
    if ($validate) {
        $sql = "SELECT collection_name FROM collections where collection_name='$collectionName'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $cNameErr = 'Collection name already available';
        } else {
            $insert = "INSERT INTO collections (
                collection_name,
                collection_description
                ) values('$collectionName','$collectionDescription')";
            $insert_value = mysqli_query($conn, $insert);
        }
    }
}

if (isset($_POST["update-collection"])) {
    $oldCollection = $_POST['collection'];
    $newCollection = $_POST['update-new'];

    $validate = true;

    if (strlen(trim($newCollection)) <= 0) {
        $updateNameErr = "Provide valid name";
        $validate = false;
    }

    if ($validate) {
        $sql = "UPDATE collections SET collection_name = ' $newCollection' WHERE collection_name = '$oldCollection'";
        $result = mysqli_query($conn, $sql);
    }
}

if (isset($_POST['delete-collection'])) {
    $deleteCollection = $_POST['deleteOption'];
    $sql = "DELETE FROM collections WHERE collection_name ='$deleteCollection'";
    $result = mysqli_query($conn, $sql);
}
