<?php
function fetchApiData( $url ) {

    try {
        $response = file_get_contents( $url );
        if ( $response === false ) {
            throw new Exception( 'Failed to fetch data from the API.' );
        }
        return json_decode( $response, true );
    } catch ( Exception $e ) {
        // log the error in debug mode
        error_log( $e->getMessage() );
        return [];
    }
}
?>
