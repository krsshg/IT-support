<HEAD>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?PHP include "start.php"; ?>
	<link href="../css/testTablesite.css" rel="Stylesheet" type="text/css">
  <link href="../css/utlaan.css" rel="Stylesheet" type="text/css">
  <link href="../css/bootstrap.css" rel="Stylesheet" type="text/css">
  <link href="../css/bufferlapp.css" rel="Stylesheet" type="text/css">
  <link href="../css/dropdown.css" rel="Stylesheet" type="text/css">
  <link href="../css/ITSupport.css" rel="Stylesheet" type="text/css">
  <link href="../css/lagerstyring.css" rel="Stylesheet" type="text/css">

</HEAD>

<?PHP

$pcnavn = $_POST["pcnavn"];
$pcmodell = $_POST["pcmodell"];
$navn = $_POST["navn"];
$avd = $_POST["avdeling"];
$utdato = $_POST["dato"];
$returdato = $_POST["eta"];
$status = $_POST["status"];
$servicetag = $_POST["servicetag"];
$tlf = $_POST["tlf"];

if (isset($_POST['rediger'])) {

$sql =
"
UPDATE PCer
SET PCname = '$pcnavn', PCmodel = '$pcmodell', LoanerName = '$navn', LoanerDep = '$avd', LoanDate = '$utdato', ETA = '$returdato', Status = '$status', ServiceTag = '$servicetag', TelefonNr = '$tlf'
WHERE PCname = '$pcnavn'
";

$params = array($pcnavn, $pcmodell, $navn, $avd, $utdato, $returdato, $status, $servicetag, $tlf);
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
$stmt = sqlsrv_query($link, $sql, $params, $options);

if($stmt === false) {
	die( print_r( sqlsrv_errors(), true));
}
if ($stmt === false) {
	Echo "Problem med SQL spørring.";
}
else {
	Echo "Database oppdatert OK.";
}


} else if (isset($_POST['slett'])) {

$sql =
"
DELETE FROM PCer
WHERE PCname = '$pcnavn'
";

$params = array($pcnavn, $pcmodell, $navn, $avd, $utdato, $returdato, $status, $servicetag, $tlf);
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
$stmt = sqlsrv_query($link, $sql, $params, $options);

if($stmt === false) {
	die( print_r( sqlsrv_errors(), true));
}
if ($stmt === false) {
	Echo "Problem med SQL spørring.";
}
else {
	Echo "Database oppdatert OK.";
}
} else {
    echo "Du kom her uten å trykke på noen knapp, merkelig.";
}

?>
