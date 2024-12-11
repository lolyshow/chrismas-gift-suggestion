<?php

function fetchApiData( $url ) {
    try {
        $response = file_get_contents( $url );
        if ( $response === false ) {
            throw new Exception( 'Failed to fetch data from the API.' );
        }
        return json_decode( $response, true );
    } catch ( Exception $e ) {
        // Log the error in debug mode
        error_log( $e->getMessage() );
        return [];
    }
}

function sendJsonResponse( $data ) {
    header( 'Content-Type: application/json' );
    echo json_encode( $data );
    exit;
}
?>
