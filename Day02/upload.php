<?php
    if(isset($_POST['submit'])) {
        $fileInput = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $filePath = $_FILES['file']['full_path'];
        $fileType = $_FILES['file']['type'];
        $fileExtension = explode('.',$fileName);
        $fileExtension = strtolower(end($fileExtension));
        $fileTmpName = $_FILES['file']['tmp_name'];
        $error = $_FILES['file']['error'];
        $fileSize = $_FILES['file']['size'];
        $type = array('jpg','jpeg','png','pdf');

        if(in_array($fileExtension,$type)){
            if($fileSize<=5000000){
                $fileNewName = uniqid('',true).'.'.$fileExtension;
                $fileDestination = 'uploads/'.$fileNewName;
                move_uploaded_file($fileTmpName,$fileDestination);
                echo '<div class= "alert alert-success" role="alert"> Sucessfully uploaded </div>';
            }else{
                echo '<div class="alert alert-danger" role="alert"> file is too big </div>';
            }
        }else{
            echo '<div class="alert alert-danger" role="alert"> Not a valid document </div>';
        }
    }
?>