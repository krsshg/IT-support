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
      SET PCname = '$PCnavn', PCmodel ='$PCmodell', LoanerName = '$blank', LoanerDep = '$blank', LoanDate = '$blank', ETA = '$blank', Status = 'Inne', ServiceTag = '$Servicetag', TelefonNr = '$blank'
      WHERE PCname='$PCid'
      ";
      echo $sql;
      $params = array();
      $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
      $stmt = sqlsrv_query($link, $sql, $params, $options);
/*
      sqlsrv_fetch($stmt);
      $PCnavn = sqlsrv_get_field($stmt, 0);
      $PCmodell = sqlsrv_get_field($stmt, 1);
      $LoanerName = sqlsrv_get_field($stmt, 2);
      $LoanerDep = sqlsrv_get_field($stmt, 3);
      $LoanerDate = sqlsrv_get_field($stmt, 4);
      $ETA = sqlsrv_get_field($stmt, 5);
      $status = sqlsrv_get_field($stmt, 6);
      $ServiceTag = sqlsrv_get_field($stmt, 7);
      $Telefonnr = sqlsrv_get_field($stmt, 8);

      echo "<FORM method='Post' action='oppdaterLanDB.php'>";
      echo "<INPUT TYPE='text' VALUE='$PCnavn'>";
      echo "<INPUT TYPE='text' VALUE='$ServiceTag'>";
      echo "<INPUT TYPE='text' VALUE='$status'>";
      echo "<INPUT TYPE='button' VALUE='test'>";

      echo "</form>";
      //echo "$PCnavn,$PCmodell,$status,$ServiceTag";
*/
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
