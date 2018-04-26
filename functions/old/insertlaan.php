<HTML>
<BODY>

<?PHP

require 'connect.php';

$pcnavn = $_POST["PC-Navn"];
$pcmodell = $_POST["PC-Modell"];
$lånernavn = $_POST["Lånernavn"];
$låneravd = $_POST["Låneravdeling"];
$utdato = $_POST["Utlånsdato"];
$returdato = $_POST["Returdato"];
$status = $_POST["Status"];
$servicetag = $_POST["ServiceTag"];
$tlf = $_POST["Telefon"];


Echo "Inndata: <br><br>";
Echo "$pcnavn<br>";
Echo "$pcmodell<br>";
Echo "$lånernavn<br>";
Echo "$låneravd<br>";
Echo "$utdato<br>";
Echo "$returdato<br>";
Echo "$status<br>";
Echo "$servicetag<br>";
Echo "$tlf<br>";

// $returdato = null;
// $utdato = null;

$sql = "INSERT INTO PCer (PCname, PCmodel, LoanerName, LoanerDep, LoanDate, ETA, Status, ServiceTag, TelefonNr)
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$params = array($pcnavn, $pcmodell, $lånernavn, $låneravd, $utdato, $returdato, $status, $servicetag, $tlf);
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);


$stmt = sqlsrv_query($link, $sql, $params, $options);
if($stmt === false) {
	die( print_r( sqlsrv_errors(), true));
}

if ($stmt === false) {
	Echo "Problem med SQL spørring.";
}
else {
	Echo "Inndata ført inn i databasen";
}

?>


</BODY>
</HTML>
