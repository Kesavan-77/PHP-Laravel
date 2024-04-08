<?php
trait friends{
function meaning(){
    echo "heavan <br>";
}
}
trait memories{
    function feel(){
        echo "bliss <br>";
    }
    }
class school{
    use friends;
}
class college{
    use friends,memories;
}

$obj1 = new school();
$obj1->meaning();

$obj2 = new college();
$obj2->meaning();
$obj2->feel();
?>