<?php
require_once 'connect.php';
$sql = "SELECT * FROM ITSansatt";
$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);


$stmt = sqlsrv_query($link, $sql, $params, $options);
if($stmt === false) {
	die( print_r( sqlsrv_errors(), true));
}
$currentrow = 0;
$row_count = sqlsrv_num_rows($stmt);
if ($row_count === false)
	echo "Klarte ikke telle rader.";
else
	echo "Antall rader: $row_count<br>";



	while ($currentrow < $row_count) {
		sqlsrv_fetch($stmt);
		
		$felt1 = sqlsrv_get_field($stmt, 0);
		echo "$felt1: ";

		$felt2 = sqlsrv_get_field($stmt, 1);
		echo "$felt2<br>";
		$currentrow = $currentrow +1;
	}


?>