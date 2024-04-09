<?php

// Interface
interface Calculation {
    public function solution();
}

// Class implementing the interface
class sumTwo implements Calculation {
    private $num1;
    private $num2;

    public function __construct($num1, $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function solution() {
        return $this->num1 * $this->num2;
    }
}

// Class implementing the interface
class product implements Calculation {
    private $num1;

    public function __construct($num1) {
        $this->num1 = $num1;
    }

    public function solution() {
        return $this->num1 * $this->num1;
    }
}

$twoSum = new sumTwo(5, 10);
$productValue = new product(7);

echo $twoSum->solution();
echo $productValue->solution();

?>