<?php

class Helper {

    function success( $data, $message = "Success", $status = 200 ) {
        header('Content-Type: application/json');
        echo json_encode( ['status'=>$status,'message'=>$message,'data'=>$data],JSON_UNESCAPED_SLASHES );
    }

    function failed( $data, $message = "Failed", $status = 400 ) {
        header('Content-Type: application/json');
        echo json_encode( ['status'=>$status,'message'=>$message,'data'=>$data], );
    }
    function notFound( $data=null, $message = "Not Found", $status = 404 ) {
        header("HTTP/1.1 404 Not Found");
        echo json_encode( ['status'=>$status,'message'=>$message,'data'=>$data], );
    }

    function serverError( $data, $message = 'Server Error', $status = 500 ) {
        header('Content-Type: application/json');
        echo json_encode( ['status'=>$status,'message'=>$message,'data'=>$data] );
    }
}

