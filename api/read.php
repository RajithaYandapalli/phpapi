<?php


header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization,X-Request-With');

include('function.php');
$req = $_SERVER["REQUEST_METHOD"];
if (!$req == "GET") {  
    $data = [
        'status' => 405,
        'message' => $req.'Error Not Allowed',
    ];

    header("http/1.0 405 Method Not Allowed");
    echo json_encode($data);
}else{
    if(isset($_GET['code'])){
        $country = getCountry($_GET);
        echo $country;
    }else{
        $countryNames = getAllCountries();
       echo $countryNames;  
    }
    

}

?>