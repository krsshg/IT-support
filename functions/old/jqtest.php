<HEAD>
<?PHP include "start.php" ?>

	<SCRIPT SRC="jquery-3.3.1.min.js"> </SCRIPT>
	<SCRIPT>
	
		$(document).ready(function(){
					
			$("#jqtest").click(function(){
				var rowCount = $('#utstyr tr').length;
				alert("Tabellen har " + (rowCount) + " rader.");
			});
			
			
			var thisRow = $('#utstyr').find('tr').click;
			
			
			
	//		$(‘#utstyr tr:eq(‘+row+’) td’).eq(col);


			
			var thisRow = $('#utstyr').find('tr').click( function(){
				alert('You clicked row '+ ($(this).index()+1) );
				alert($(thisRow).index()+1);
			});

			
			
			
		});
	</SCRIPT>
</HEAD>

<button id="jqtest">jQtest</button>


<?php
$sql = "SELECT * FROM PCer WHERE Status='Inne'";
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
echo "      <th>Rediger</th>";
echo "  </tr>";

for($i = 0; $i < $row_count; $i++){
sqlsrv_fetch($stmt);
$felt1 = sqlsrv_get_field($stmt, 0);
$felt2 = sqlsrv_get_field($stmt, 1);


echo "  <tr>";
echo "      <td>$felt1</td>";
echo "      <td>$felt2</td>";
echo "		<td><button type='submit' id='$felt1'>Rediger</button></td>";
echo "  </tr>";
}
echo "</table>";
}
?>
