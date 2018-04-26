<HTML>
<HEAD>
<?PHP require '../connect.php';?>
</HEAD>
<body>

<?php

if (isset($_POST['avdelingID']))
    {
    $avdID = $_POST['avdelingID'];
	$sql =
	"
	SELECT Beholdning.ProdID, Beholdning.Antall, Produkter.Beskrivelse
	FROM Beholdning
	INNER JOIN Produkter ON Beholdning.ProdID=Produkter.ProduktID
	WHERE AvdID = '$avdID'
	ORDER BY Beholdning.Antall DESC
	";


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

	echo "<div class='rTableHeadinn'><strong>Produkt:</strong></div>";
	echo "<div class='rTableinn'>";
	echo "  <div class='rTableBodyinn'>";
//echo "      <div class='rTableRowinn'>";
//echo "       </div>"; //rTableRow

	echo "
		<form action='/produktQuery.php'>
		<select name='Produkt'>
		";

	if($row_count > 0){

	for($i = 0; $i < $row_count; $i++){
		sqlsrv_fetch($stmt);
		$prodID = trim(sqlsrv_get_field($stmt, 0));
		$antall = trim(sqlsrv_get_field($stmt, 1));
		$beskrivelse = trim(sqlsrv_get_field($stmt, 2));
		echo "
		<option value='$prodID'>$beskrivelse ($antall)</option>
		";


	} //end for loop

	} //end if loop


	echo "
		</select>
		<br><br>
		<input type='submit'>
		</form>
		";
	}
	?>
</body>
</HTML>
