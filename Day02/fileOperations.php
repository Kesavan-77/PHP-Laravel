<!-- file handling and operations -->
<html>
    <head>
        <title>fileOperations</title>
    </head>
    <body>
        <h1>Hello</h1>
        <!-- include or require -->
        <?php require 'demo.php'?>
        <br>
    </body>
    <?php
    //file handling operations
    echo readfile('demo.txt')."<br><br>";

    //open and read file operations
    $myFile = fopen("demo.txt",'r') or die ("unable to open a file");
    echo fread($myFile,filesize('demo.txt'))."<br><br>";
    fclose($myFile);

    //for reading a single line in the file
    $myFile = fopen("demo.txt",'r') or die ("unable to open a file");
    while(!feof($myFile)) {
        echo fgets($myFile)."<br><br>";
    }
    fclose($myFile);

    //reading a single char in the file
    $myFile = fopen("demo.txt",'r') or die ("unable to open a file");
    while(!feof($myFile)) {
        echo fgetc($myFile);
    }
    fclose($myFile);

    //create or writing operations
    $myFile = fopen("basic.txt",'w');
    $txt = "hello php";
    fwrite($myFile,$txt);
    fclose($myFile);

    //create or writing operations
    $myFile = fopen("basic.txt",'a');
    $txt = " Im the admin";
    fwrite($myFile,$txt);
    fclose($myFile);
    ?>
</html>