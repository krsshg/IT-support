<?php
function db_connect()
{
  $serverName = "glo-nts15.elkem.com,40137";
  $connectioninfo = array("UID"=>"sqlkrsitsup", "PWD"=>"2TipJNKS","Database"=>"ITSLagerKRS"); #Syntax: $connectioninfo = array( "Database"=>dbName)
  $DBlink = sqlsrv_connect($serverName, $connectioninfo);

 if( $DBlink === false )
 {
  echo "Error linking to DB";
  die( print_r( sqlsrv_errors(), true));
 }
 return $DBlink;
}
?>
