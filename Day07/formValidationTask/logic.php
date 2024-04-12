<?php

interface Validate{
    public function getStatus();
}

class Name implements Validate{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
    function getStatus(){
        if(strlen(trim($this->name))>=3){
            return true;
        }else{
            return false;
        }
    }
}

class Email implements Validate{
    
    private $email;

    public function __construct($email)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->email = $email;
    }
    function getStatus(){
        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)==false){
            return true;
        }else{
            return false;
        }
    }
}

class URL implements Validate{
    
    private $url;

    public function __construct($url)
    {
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->url = $url;
    }
    function getStatus(){
        if(!filter_var($this->url,FILTER_VALIDATE_URL)==false){
            return true;
        }else{
            return false;
        }
    }
}

class Adult implements Validate{
    private $adult;

    public function __construct($adult)
    {
        $this->adult = $adult;
    }

    function getStatus(){
        if($this->adult == true || $this->adult == false){
            return true;
        }else{
            return false;
        }
    }
}

class PNO implements Validate{

    private $phNumber;

    public function __construct($phNumber)
    {
        $this->phNumber = $phNumber;
    }

    function getStatus(){
        $this->phNumber = (string) $this->phNumber;
        if(strlen($this->phNumber)==10){
            return true;
        }else{
            return false;
        }
    }
}

class Message implements Validate{

    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }
    function getStatus(){
        if(strlen(trim($this->message))>0){
            return true;
        }else{
            return false;
        }
    }
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $url = $_POST['url'];
    $adult = $_POST['adult'];
    $ph_no = $_POST['number'];
    $message = $_POST['msg'];

    $final_result = true;

    $nameObj = new Name($name);
    if(!$nameObj->getStatus()){
        $nameErr = "Enter a valid name";
        $final_result = false;
    }else{
        $nameErr = " ";
    }

    $emailObj = new Email($email);
    if(!$emailObj->getStatus()){
        $emailErr = "Enter a valid email";
        $final_result = false;
    }else{
        $emailErr = " ";
    }

    $URLObj = new URL($url);
    if(!$URLObj->getStatus()){
        $urlErr = "Enter a valid URL";
        $final_result = false;
    }else{
        $urlErr = " ";
    }

    $adultObj = new Adult($adult);
    if(!$adultObj->getStatus()){
        $adultErr = "Enter a valid option";
        $final_result = false;
    }else{
        $adultErr = " ";
    }

    $ph_noObj = new PNO($ph_no);
    if(!$ph_noObj->getStatus()){
        $phErr = "Enter a valid phone number";
        $final_result = false;
    }else{
        $phErr = " ";
    }

    $msgObj = new Message($message);
    if(!$msgObj->getStatus()){
        $msgErr = "Enter a valid message";
        $final_result = false;
    }else{
        $msgErr = " ";
    }

    if($final_result){
        header("Location: result.php?name=" . urlencode($name)."&email=".urlencode($email)."&url=".urlencode($url)."&adult=".urlencode($adult)."&ph_no=".urlencode($ph_no)."&msg=".urlencode($message));
        exit();
    }
} else {
    echo "Form not submitted.";
}
?>