
<?php

//(i due link sotto servono per far riconoscere il beck col front-edn)
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");


//convertire file php in un file json
header('Content-Type: application/json');

$file = "data.json";

$newSkill = $_POST;
$dataStr = file_get_contents($file);
$data = json_decode($dataStr);
$data[] = $newSkill;

$encData = json_encode($data);
file_put_contents($file, $encData);


echo $encData;



// file_put_contents("test.json", $encData);



?>