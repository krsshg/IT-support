<HTML>
<HEAD>
<?PHP require 'connect.php';?>
</HEAD>
<body>

<?php

$sql = "SELECT * FROM Avdeling";
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
$field_count = sqlsrv_num_fields ($stmt);
if ($field_count === false)
	echo "Klarte ikke telle felter.";
else

echo "<div class='rTableHeadinn'><strong>Avdeling:</strong></div>";
echo "<div class='rTableinn'>";
echo "  <div class='rTableBodyinn'>";
//echo "      <div class='rTableRowinn'>";
//echo "       </div>"; //rTableRow

echo "
	<form action='produktQuery.php' method ='Post'>
	<select name='Avdeling'>
	";

if($row_count > 0){

	

  for($i = 0; $i < $row_count; $i++){
    sqlsrv_fetch($stmt);
    $avdID = trim(sqlsrv_get_field($stmt, 0));
    $avdNavn = trim(sqlsrv_get_field($stmt, 1));
	echo "
    <option value='$avdID'>$avdNavn</option>
	";
    
  
  } //end for loop
	
} //end if loop


echo "
	</select>
	<br><br>
	<input type='submit'>
	</form>
	";
?>
</body>
</HTML>
