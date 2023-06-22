
<?php

//(i due link sotto servono per far riconoscere il beck col front-edn)
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");


//convertire file php in un file json
header('Content-Type: application/json');


$data = $_POST;
echo json_encode($data);

// file_put_contents("test.json", $encData);



?>