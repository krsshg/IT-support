<?php
/* Database credentials. */

#define('DB_USERNAME', 'krsitsup');
#define('DB_PASSWORD', 'Elkem123');
#define('DB_NAME', 'ITSLagerKRS');
$serverName = "glo-nts15.elkem.com,40137";
$connectioninfo = array("UID"=>"sqlkrsitsup", "PWD"=>"2TipJNKS","Database"=>"ITSLagerKRS"); #Syntax: $connectioninfo = array( "Database"=>dbName)
/* Connect to MySQL database */
$link = sqlsrv_connect($serverName, $connectioninfo);

// Check connection
if( $link === false ) {
     die( print_r( sqlsrv_errors(), true));
}
?>
