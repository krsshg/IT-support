<HTML>
<HEAD>
<?PHP require '../connect.php';?>
</HEAD>
<body>

<?php

if (isset($_POST['avdelingID']) && isset($_POST['produktID']) && isset($_POST['innAntall']))
    {
	$avdelingID = $_POST['avdelingID'];
	$produktID = $_POST['produktID'];
	$innAntall = $_POST['innAntall'];
  echo $avdelingID;
  echo $produktID;
  echo $innAntall;

	$sql =
	"
	SELECT Antall
	FROM Beholdning
	WHERE AvdID = (?) AND ProdID = (?)
	";

	$params = array($avdelingID,$produktID);
	$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
	$stmt = sqlsrv_query($link, $sql, $params, $options);
  echo $sql;
	if($stmt === false)
		{
		die( print_r( sqlsrv_errors(), true));
		}
sqlsrv_fetch($stmt);

	$lagerAntall = sqlsrv_get_field($stmt, 0);
  if($lagerAntall === false)
  {
    $insertSql =
	"
	INSERT INTO Beholdning
	VALUES (?, ?, ?)
	";

	$insertParams = array($produktID, $avdelingID, $innAntall);
	$insertOptions = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
	$insertStmt = sqlsrv_query($link, $insertSql, $insertParams, $insertOptions);
	echo "Nytt felt skrevet i database";
  }
  else
  {
  echo "<br>";
  echo "lagera= ". $lagerAntall;
  echo "<br>";
  echo "innAa= ". $innAntall;
  echo "<br>";
	$nyttAntall = $lagerAntall + $innAntall;
  echo "<br>";
  echo "nyttAa=".$nyttAntall;
  echo "<br>";

	if ($nyttAntall > 0 OR $nyttAntall === 0)
		{

		$sql2 =
		"
			UPDATE Beholdning
			SET Antall = '$nyttAntall'
			WHERE AvdID = '$avdelingID' AND ProdID = '$produktID'
		";

		$params2 = array();
		$options2 = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
		$stmt2 = sqlsrv_query($link, $sql2, $params2, $options2);
		if($stmt2 === false)
			{
			die( print_r( sqlsrv_errors(), true));
			}
		}
	}
  header("Location: http://144.127.128.203/functions/lager/lagerMeny.php"); /* Redirect browser */
	}
?>
</body>
</HTML>
