<!DOCTYPE html>
<?php

//reading data from available file
$xml_file = simplexml_load_file("college.xml") or die("unable to open the file");
foreach($xml_file as $val){
    echo "| ".$val->first_name." ".$val->last_name." | ".$val->email." | ".$val->gender." |<br><br>";
}

//reading xml data from external url and storing it in json format
$xml_url = "http://www.w3schools.com/xml/plant_catalog.xml";

$xml = simplexml_load_file($xml_url);
if ($xml === false) {
    echo "Failed to load XML file";
    exit;
}

$myfile = fopen("sample.json","w");
fwrite($myfile,json_encode($xml));
fclose($myfile);

//reading xml data from external website and storing exact xml data
$xml = file_get_contents($xml_url);
if ($xml === false) {
    echo "Failed to load XML file";
    exit;
}

$myfile = fopen("sample.xml", "w");
fwrite($myfile, $xml);
fclose($myfile);

$newXmlDoc = new SimpleXMLElement($xml);

print_r($newXmlDoc->PLANT[2]->COMMON);


?>