<?php
include './helper/Helper.php';
// Enable CORS
header( 'Access-Control-Allow-Origin: *' );
$helper = new Helper();
$endpoint = isset( $_GET[ 'endpoint' ] ) ? $_GET[ 'endpoint' ] : '';

switch ( $endpoint ) {
    case 'search':
    try {
        include 'api/search.php';
        break;
    }
    catch ( Exception $e ) {
        echo "error!!!";
    }
    default:
        $helper->notFound( 'Invalid endpoint' );
}
?>
