<HTML>
<BODY>

<?PHP
include 'buildPrnFile.php';

$EGS = $_POST["EGS"];
$Til = $_POST["Til"];
$Tlf = $_POST["TLF"];
$Avdeling = $_POST["avdeling"];
$numCopies = $_POST["antall"];
createInternpostPRN($EGS,$Til,$Tlf,$Avdeling,$numCopies);
/* Her var det mulig å skrive ut til begge printerene samtidig.

if (!empty($_POST['printerValg'] && !empty($_POST['printerValg2'])))
{
  printPRN("\\krs-nts03\krs-prt-itpostlapphovedlager");
  printPRN("\\krs-nts03\krs-prt-itpostlapp");
}
elseif (!empty($_POST['printerValg'] && (empty($_POST['printerValg2']))))
{
  printPRN("\\krs-nts03\krs-prt-itpostlapp");
}
elseif (!empty($_POST['printerValg2'] && (empty($_POST['printerValg']))))
{
  printPRN("\\krs-nts03\krs-prt-itpostlapphovedlager");
}
*/

//Sjekke hvilken printer som er valg og skrive ut (kun mulig å velge en)
if (!empty($_POST['printerValg']))
{
  printPRN("\\krs-nts03\krs-prt-itpostlapp");
}
elseif (!empty($_POST['printerValg2']))
{
  printPRN("\\krs-nts03\krs-prt-itpostlapphovedlager");
}


header("Location: http://144.127.128.203/functions/labels/postlapp.php"); /* Redirect browser */
exit();
?>

</BODY>
</HTML>
