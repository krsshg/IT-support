<HTML>
<HEAD>
<?PHP require '../connect.php';?>
</HEAD>
<body>

<?php

if (isset($_POST['avdelingID']) && isset($_POST['produktID']) && isset($_POST['lagerAntall']) && isset($_POST['utAntall']))
    {
	$avdelingID = $_POST['avdelingID'];
	$produktID = $_POST['produktID'];
	$lagerAntall = $_POST['lagerAntall'];
	$utAntall = $_POST['utAntall'];
	$nyttAntall = $lagerAntall - $utAntall;

	if ($nyttAntall > 0 OR $nyttAntall === 0)
		{

		$sql =
		"
			UPDATE Beholdning
			SET Antall = '$nyttAntall'
			WHERE AvdID = '$avdelingID' AND ProdID = '$produktID'
		";

		$params = array();
		$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
		$stmt = sqlsrv_query($link, $sql, $params, $options);
		if($stmt === false)
			{
			die( print_r( sqlsrv_errors(), true));
			}



		}
	}else
  		{
				ECHO "Ikke nok på lager til å gjennomføre forespørsel.";
			}
?>
</body>
</HTML>
