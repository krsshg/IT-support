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

      $blank="";
      $sql =
      "
      UPDATE PCer
      SET PCname = '$PCnavn', PCmodel ='$PCmodell', LoanerName = '$Lanernavn', LoanerDep = '$Laneravd', LoanDate = '$Lanerdato', ETA = '$ETA', Status = 'Ute', ServiceTag = '$Servicetag', TelefonNr = '$TLF'
      WHERE PCname='$PCid'
      ";
      echo $sql;
      $params = array();
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
    }
    header("Location: http://144.127.128.203/functions/utlaan/utlaan.php"); /* Redirect browser */
?>
