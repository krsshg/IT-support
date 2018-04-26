<html>
<body>

<?php
require_once 'connect.php';
?>

<form action="insertlaan.php" method="post">
<table style= "width:50%">
	
<th>PC-Navn: <input type="text" name="PC-Navn"><br></th>
<th>PC-Modell: <input type="text" name="PC-Modell"><br></th>
<th>Lånernavn: <input type="text" name="Lånernavn"><br></th>
<th>Låneravdeling: <input type="text" name="Låneravdeling"><br></th>
<th>Utlånsdato: <input type="date" name="Utlånsdato"><br></th>
<th>Returdato: <input type="date" name="Returdato"><br></th>
<th>Status: <input type="text" name="Status"><br></th>
<th>ServiceTag: <input type="text" name="ServiceTag"><br></th>
<th>Telefon: <input type="text" name="Telefon"><br></th>

</table>

<input type="submit">
</form>

<?php

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
		echo date_format($felt6, "Y-m-d ");
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

</body>
</html>