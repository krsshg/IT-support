<?php
require_once 'connect.php';
$sql = "SELECT * FROM PCer";
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
		echo "PCNavn: $felt1: ";

		$felt2 = sqlsrv_get_field($stmt, 1);
		echo "Modell: $felt2 ";
		
		$felt3 = sqlsrv_get_field($stmt, 2);
		echo "Til bruker: $felt3 ";
		
		$felt4 = sqlsrv_get_field($stmt, 3);
		echo "Til avdeling: $felt4 >";
		
		$felt5 = sqlsrv_get_field($stmt, 4);
		echo "Utlånsdato: ";
		if ($felt5 != null) {
		echo date_format($felt5, "Y-m-d ");
		}
		
		$felt6 = sqlsrv_get_field($stmt, 5);
		echo "Eta retur: ";
		if ($felt6 != null) {
		echo date_format($felt5, "Y-m-d ");
		}
		
		$felt7 = sqlsrv_get_field($stmt, 6);
		echo "Status: $felt7 ";
		
		$felt8 = sqlsrv_get_field($stmt, 7);
		echo "ServiceTag: $felt8 ";
		
		$felt9 = sqlsrv_get_field($stmt, 8);
		echo "Tlf: $felt9 <br>";
				
		$currentrow = $currentrow +1;
	}


?>