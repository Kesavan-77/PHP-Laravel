<?php
$n = 10;

//pattern 1
echo "<h3>pattern 1</h3> <br>";
for($i=0;$i<=$n;$i++){
    for($j=0;$j<=$i;$j++){
        echo "*";
    }
    echo "<br>";
}

//patter2
echo "<h3>pattern 2</h3> <br>";
for($i=0;$i<=$n;$i++){
    for($j=$n;$j>=$i;$j--){
        echo "&nbsp";
    }
    for($k=0;$k<=$i;$k++){
        echo "*";
    }
    echo "<br>";
}

//pattern3
echo "<h3>pattern 3</h3> <br>";
for($i=0;$i<=$n;$i++){
    for($j=$n;$j>=$i;$j--){
        echo "&nbsp";
    }
    for($k=0;$k<=$i;$k++){
        if($k==0 || $k==$i || $i==$n){
            echo "*";
        }else{
            echo "&nbsp ";
        }
        
    }
    echo "<br>";
}
?>