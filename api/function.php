<?php


require 'conn.php';

function error422($message){
    $data = [
        'status' => 422,
        'message' => $message
    ];

    header("http/1.0 422 Method Not Allowed");
    echo json_encode($data);
}
function getAllCountries(){
    global $conn;

    $get_query ="SELECT * FROM countries";
    $query1 = mysqli_query($conn,$get_query);
    
    if($query1){

        if (mysqli_num_rows($query1)>0){

            $res = mysqli_fetch_all($query1,MYSQLI_ASSOC);
            $data = [
                'status' => 200,
                'message' =>'Succesfuly',
                'data' => $res
            ];
        
            header("http/1.0 200 ok");
            echo json_encode($data);

        }else{
            $data = [
                'status' => 404,
                'message' =>'No Countries Found',
            ];
        
            header("http/1.0 404 Method Not Allowed");
            echo json_encode($data);
        }

    }else{
        $data = [
            'status' => 500,
            'message' =>'Internal server Error',
        ];
    
        header("http/1.0 500 Method Not Allowed");
        echo json_encode($data);
    }


}
function createCountry($getInputs){
  
    global $conn;

    $name = mysqli_real_escape_string($conn,$getInputs['name']);
    $code = mysqli_real_escape_string($conn,$getInputs['code']);
    $population = mysqli_real_escape_string($conn,$getInputs['population']);
    
    if(empty(trim($name))){
      return error422('Provide Country Name');
    }elseif(empty(trim($code))){
        return error422('Provide Country Counry Code');
    }elseif(empty(trim($population))){
        return error422('Provide Country Counry Code');
    }else{
        $query = "INSERT INTO countries (name,code,population) VALUES('$name','$code','$population')";
        $result = mysqli_query($conn,$query);
    
        if ($result){
            $data = [
                'status' => 201,
                'message' => 'Country Created Successfully',
            ];
        
            header("http/1.0 201 Created");
            echo json_encode($data);
    
        }else{
            $data = [
                'status' => 500,
                'message' => 'Internal Server Errors',
            ];
        
            header("http/1.0 500 Method Not Allowed");
            echo json_encode($data);
        }
    }
    
    
    
}

function  getCountry($params){
    global $conn;

    if ($params['code'] == null){
        return error422('provide country code');
    }

     $countryCode = mysqli_real_escape_string($conn,$params['code']);

    $getCountryById = "SELECT * FROM countries WHERE code='$countryCode'  LIMIT 1";
    $query2 = mysqli_query($conn,$getCountryById);

    if($query2){
        if (mysqli_num_rows($query2) == 1){

            $res = mysqli_fetch_assoc($query2);
            $data = [
                'status' => 200,
                'message' =>'Succesfuly',
                'data' => $res
            ];
        
            header("http/1.0 200 ok");
            echo json_encode($data);

        }else{
            $data = [
                'status' => 404,
                'message' =>'No Countries Found',
            ];
        
            header("http/1.0 404 Method Not Allowed");
            echo json_encode($data);
        }

    }else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Errors',
        ];
    
        header("http/1.0 500 Method Not Allowed");
        echo json_encode($data);
    }

}

function updateCountry($getInputs,$params){
  
    global $conn;
 
    
    $countryCode = mysqli_real_escape_string($conn,$params['code']);
   // echo $countryCode;

    $name = mysqli_real_escape_string($conn,$getInputs['name']);
    $code = mysqli_real_escape_string($conn,$getInputs['code']);
    $population = mysqli_real_escape_string($conn,$getInputs['population']);
    
    if(empty(trim($name))){
      return error422('Provide Country Name');
    }elseif(empty(trim($code))){
        return error422('Provide Country Counry Code');
    }elseif(empty(trim($population))){
        return error422('Provide Country Counry Code');
    }else{
        $query = "UPDATE  countries  SET name='$name',code='$code',population='$population' WHERE code = '$countryCode'";
        $result = mysqli_query($conn,$query);
    
        if ($result){
            $data = [
                'status' => 200,
                'message' => 'Country Updated Successfully',
            ];
        
            header("http/1.0 200 Updated");
            echo json_encode($data);
    
        }else{
            $data = [
                'status' => 500,
                'message' => 'Internal Server Errors',
            ];
        
            header("http/1.0 500 Method Not Allowed");
            echo json_encode($data);
        }
    }
    
    
    
}

function deleteCountry($params){
    global $conn;
    $countryCode = mysqli_real_escape_string($conn,$params['code']);
    $deleteQuery = "DELETE FROM countries WHERE code='$countryCode'";
    $query4 = mysqli_query($conn,$deleteQuery);

    if ($query4){
        $data = [
            'status' => 200,
            'message' => 'Succefully deleted',
        ];
    
        header("http/1.0 200 ok");
        echo json_encode($data);
       
    }else{
        $data = [
            'status' => 404,
            'message' => 'Country Not Found',
        ];
    
        header("http/1.0 404 Method Not Allowed");
        echo json_encode($data);

    }

    
}
?>