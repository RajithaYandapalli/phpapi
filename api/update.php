<?php


header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization,X-Request-With');

include('function.php');
$req = $_SERVER["REQUEST_METHOD"];


if ($req != "PUT"){
    $data = [
        'status' => 405,
        'message' => $req.'Error Not Allowed',
    ];

    header("http/1.0 405 Method Not Allowed");
    echo json_encode($data);
}else{

    $countryNames = json_decode(file_get_contents("php://input"),true);
    if(empty($countryNames)){

      $createNew = updateCountry($_POST,$_GET);
    }
    else{

       $createNew = updateCountry($countryNames,$_GET);
    }

     //echo $createNew;

}

?>