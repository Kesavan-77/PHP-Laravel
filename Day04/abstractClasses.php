<?php
#abstractClasses
abstract class ParentClass{
    abstract protected function display($name);
}
class childA extends ParentClass{
    function display($name){
        echo "This is childA $name";
    }
}
class childB extends ParentClass{
    function display($name) : string {
        return "This is childB $name";
    }
}
$obj1 = new childA();
$obj1->display("XXX");
echo "<br>";
$obj2 = new childB();
echo $obj2->display("XXX");
?>