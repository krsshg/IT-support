<?php
require_once 'connect.php';
$sql = "SELECT * FROM Uttak";
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
		echo "UttakID $felt1: ||";

		$felt2 = sqlsrv_get_field($stmt, 1);
		echo "AvdelingID: $felt2 ||";
		
		$avdelingsql = "Select AvdNavn FROM Avdeling WHERE AvdID = $felt2";
		$avdelingstmt = sqlsrv_query($link, $avdelingsql, $params, $options);
		if($avdelingstmt === false) {
			die(print_r(sqlsrv_errors(), true));
		}
		
		sqlsrv_fetch($avdelingstmt);
		$avdelingsnavn = sqlsrv_get_field($avdelingstmt, 0);
		echo "Avdeling: $avdelingsnavn ||";
		
		$felt3 = sqlsrv_get_field($stmt, 2);
		echo "AnsattID: $felt3 ||";

		$ansattsql = "SELECT Navn FROM ITSansatt WHERE AnsattID = $felt3";
		
		$ansattstmt = sqlsrv_query($link, $ansattsql, $params, $options);
		if($ansattstmt === false) {
			die(print_r(sqlsrv_errors(), true));
		}

		sqlsrv_fetch($ansattstmt);
		$ansattnavn = sqlsrv_get_field($ansattstmt, 0);
		echo "Uttaker: $ansattnavn ||";
		
		$felt4 = sqlsrv_get_field($stmt, 3);
		echo "ProduktID: $felt4 ||";
		
		$felt5 = sqlsrv_get_field($stmt, 4);
		echo "Antall: $felt5 ||";
		
		$felt6 = sqlsrv_get_field($stmt, 5);
		echo "Dato: ||";
		echo date_format($felt6, "Y-m-d ");
		
		$felt7 = sqlsrv_get_field($stmt, 6);
		echo "Kommentar: $felt7 ||<br>";
		
		$currentrow = $currentrow +1;
	}


?>