<?php
require "../connect.php";

    if (isset($_POST['PCnavn']))
    {
      $PCnavn = $_POST['PCnavn'];
      $PCid = $_POST['PCnavnID'];
      $PCmodell = $_POST['PCmodell'];
      $Servicetag = $_POST['ServiceTag'];
      $Status = $_POST['Status'];
      $Lanernavn = $_POST['Lanernavn'];
      $Laneravd = $_POST['Laneravd'];
      $TLF = $_POST['TLF'];
      $Lanerdato = $_POST['Lanerdato'];
      $ETA = $_POST['ETA'];

      if (isset($_POST['oppdaterBtn'])) {
        $sql =
        "
        UPDATE PCer
        SET PCname = (?), PCmodel =(?), LoanerName = (?), LoanerDep = (?), LoanDate = (?), ETA = (?), Status = (?), ServiceTag = (?), TelefonNr = (?)
        WHERE PCname=(?)
        ";
        echo $sql;

        $params = array($PCnavn,$PCmodell,$Lanernavn,$Laneravd,$Lanerdato,$ETA,$Status,$Servicetag,$TLF,$PCid);
        $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
        $stmt = sqlsrv_query($link, $sql, $params, $options);
      }
      else if (isset($_POST['slettBtn'])) {
        $sql =
        "
        DELETE FROM PCer
        WHERE PCname = (?)
        ";
        echo "$sql";
        $params = array($PCnavn);
        $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
        $stmt = sqlsrv_query($link, $sql, $params, $options);
      }

/*    [PCname]
      ,[PCmodel]
      ,[LoanerName]
      ,[LoanerDep]
      ,[LoanDate]
      ,[ETA]
      ,[Status]
      ,[ServiceTag]
      ,[TelefonNr]
*/

    else
    {
        echo "Post not received.";
    }}
    header("Location: http://144.127.128.203/functions/utlaan/utlaan.php"); /* Redirect browser */
?>
