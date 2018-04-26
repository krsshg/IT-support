<?php
require "../connect.php";

    if (isset($_POST['PCnavn']))
    {
      $PCnavn = $_POST['PCnavn'];
      $PCmodell = $_POST['PCmodell'];
      $Servicetag = $_POST['ServiceTag'];

      $sql =
      "
      INSERT INTO PCer (PCname, PCmodel,ServiceTag)
      VALUES (?,?,?)
      ";
      $params = array($PCnavn,$PCmodell,$Servicetag);
      $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
      $stmt = sqlsrv_query($link, $sql, $params, $options);
    }
/*    PCer tabellen i databasen:
      [PCname]
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
