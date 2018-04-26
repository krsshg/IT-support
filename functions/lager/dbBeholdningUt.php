<HTML>
<HEAD>
<?PHP require '../connect.php';?>
</HEAD>
<body>

<?php
session_start();

//avdeling, produkt, utAntall
if (isset($_POST['avdeling']) && isset($_POST['produkt']) && isset($_POST['utAntall']))
  {
	$avdelingID = $_POST['avdeling'];
	$produktID = $_POST['produkt'];
	$utAntall = $_POST['utAntall'];
  //hente lagerantall
	$sql =
	"
	SELECT Antall
	FROM Beholdning
	WHERE AvdID = (?) AND ProdID = (?)
	";

	$params = array($avdelingID,$produktID);
	$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
	$stmt = sqlsrv_query($link, $sql, $params, $options);
	if($stmt === false)
	   {
	   die( print_r( sqlsrv_errors(), true));
	   }
  sqlsrv_fetch($stmt);

	$lagerAntall = sqlsrv_get_field($stmt, 0);
  $nyttAntall= $lagerAntall - $utAntall;
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

    //Skrive log til uttak tabellen
    //[AvdID],[Username],[ProduktID],[Antall],[Dato],[Kommentar]
    $username = $_SESSION['login_user'];
    $tempAnsattID = "1";
    $dagensDato= date('Y-m-d');
    $kommentar =$_POST['kommentar'];
    $logSql =
    "
    INSERT INTO Uttak
  	VALUES (?, ?, ?, ?, ?, ?)
    ";
    $logParams = array($avdelingID,$username, $produktID, $utAntall, $dagensDato,$kommentar);
  	$logOptions = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    echo $logSql;
    print_r( $logParams);
    $logStmt = sqlsrv_query($link, $logSql, $logParams, $logOptions);

    header("Location: http://144.127.128.203/functions/lager/lagerMeny.php"); /* Redirect browser */
    }
    else{
      echo "feil";
    }
?>
</body>
</HTML>
