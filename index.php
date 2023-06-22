
    <?php

    //(i due link sotto servono per far riconoscere il beck col front-edn)
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: X-Requested-With");


    //convertire file php in un file json
    header('Content-Type: application/json');


    $skillsStr = file_get_contents("data.json");
    echo $skillsStr;

    ?>

