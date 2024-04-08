<?php
interface Bike{
    public function price();
}
class Ntorq implements Bike{
    public function price(){
        echo "Ntorq : 120000";
    }
}

class MT15 implements Bike{
    public function price(){
        echo "MT15 : 180000";
    }
}

class R15 implements Bike{
    public function price(){ 
        echo "R15 : 200000";
    }
}

$bike = new Ntorq();
$bike->price();

echo "<br>";

$bike = new MT15();
$bike->price();

echo "<br>";

$bike = new R15();
$bike->price();

?>
