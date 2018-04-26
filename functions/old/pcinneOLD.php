<HEAD>
	<SCRIPT SRC="..\js\jquery-3.3.1.min.js"></SCRIPT>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<SCRIPT>
		$(document).ready(function(){
			$("#redigerknapp").click(function(){

$.post('/foo.php', { key1: 'value1', key2: 'value2' }, function(result) {
    alert('successfully posted key1=value1&key2=value2 to foo.php');
});


	//			$("#utstyr").hide();
			});
		});
	</SCRIPT>

	<script>
	$(document).ready(function(){
	  $("#myInput").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#utstyr tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});
	</script>

</HEAD>
<input id="myInput" type="text" placeholder="Search..">
<br><br>

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
