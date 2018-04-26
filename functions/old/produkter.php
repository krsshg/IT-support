<?php
require_once 'connect.php';
$sql = "SELECT * FROM Produkter";
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
	echo "Antall rader: $row_count<br><br>";

$field_count = sqlsrv_num_fields ($stmt);
if ($field_count === false)
	echo "Klarte ikke telle felter.";
else
	echo "Antall felt: $field_count<br><br>";

	while ($currentrow < $row_count) {
		sqlsrv_fetch($stmt);
		
		$felt1 = sqlsrv_get_field($stmt, 0);
		echo "ProduktID $felt1: ";

		$felt2 = sqlsrv_get_field($stmt, 1);
		echo "Produktnavn: $felt2 ";
		
		$felt3 = sqlsrv_get_field($stmt, 2);
		echo "$felt3<br>";
		
		
		$currentrow = $currentrow +1;
	}


?>