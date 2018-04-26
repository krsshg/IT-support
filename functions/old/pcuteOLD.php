<?php
$sql = "SELECT * FROM PCer WHERE Status='Ute'";
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
//	echo "Antall rader: $row_count<br><br>";

$field_count = sqlsrv_num_fields ($stmt);
if ($field_count === false)
	echo "Klarte ikke telle felter.";
else
//	echo "Antall felt: $field_count<br><br>";



if($row_count > 0){

echo "<table id='utstyr'>";
echo "  <tr>";
echo "      <th>PC-Navn</th>";
echo "      <th>PC-Modell</th>";
echo "      <th>Lånernavn</th>";
echo "      <th>Avdeling</th>";
echo "      <th>Lånedato</th>";
echo "      <th>ETA</th>";
echo "      <th>Status</th>";
echo "      <th>ServiceTag</th>";
echo "      <th>TLF</th>";
echo "      <th>Returner</th>";
echo "  </tr>";

for($i = 0; $i < $row_count; $i++){
sqlsrv_fetch($stmt);
$felt1 = sqlsrv_get_field($stmt, 0);
$felt2 = sqlsrv_get_field($stmt, 1);
$felt3 = sqlsrv_get_field($stmt, 2);
$felt4 = sqlsrv_get_field($stmt, 3);
$felt5 = sqlsrv_get_field($stmt, 4);
$felt6 = sqlsrv_get_field($stmt, 5);
$felt7 = sqlsrv_get_field($stmt, 6);
$felt8 = sqlsrv_get_field($stmt, 7);
$felt9 = sqlsrv_get_field($stmt, 8);


echo "  <tr>";
echo "      <td>$felt1</td>";
echo "      <td>$felt2</td>";
echo "      <td>$felt3</td>";
echo "      <td>$felt4</td>";
echo "		<td>";
if ($felt5 != null) {
	echo date_format($felt5, "Y-m-d");
}
echo "		</td>";
echo "      <td>";
if ($felt6 != null) {
	echo date_format($felt6, "Y-m-d");
}
echo "		</td>";
echo "      <td>$felt7</td>";
echo "      <td>$felt8</td>";
echo "      <td>$felt9</td>";
echo "		<td><button>Returner</button></td>";
echo "  </tr>";
}
echo "</table>";
}
?>