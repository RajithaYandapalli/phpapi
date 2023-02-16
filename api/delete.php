<?php


header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization,X-Request-With');

include('function.php');
$req = $_SERVER["REQUEST_METHOD"];
if (!$req == "DELETE") {  
    $data = [
        'status' => 405,
        'message' => $req. 'Error Not Allowed',
    ];

    header("http/1.0 405 Method Not Allowed");
    echo json_encode($data);
}else{
    if(isset($_GET['code'])){
        $country = deleteCountry($_GET);
        //echo $country;
    }else{
       // $countryNames = deleteAllCountries();
       // echo $countryNames;  
    }
    

}

?>