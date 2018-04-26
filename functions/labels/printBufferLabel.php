<HTML>
<BODY>

<?PHP
include 'buildPrnFile.php';

$Avdeling = $_POST["avdeling"];

createBufferPRN($Avdeling);
printPRN("\\krs-nts03\krs-prt-itpostlapp", 1);

header("Location: http://144.127.128.203/functions/labels/bufferlapp.php"); /* Redirect browser */
exit();
?>


</BODY>
</HTML>
