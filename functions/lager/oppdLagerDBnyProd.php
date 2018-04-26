<?php
require "../connect.php";

//skrive nytt produkt, ProduktID - Beskrivelse - evnt MinBeholdning
    if (isset($_POST['Beskrivelse']))
    {
      $Beskrivelse = $_POST['Beskrivelse'];
      $sql =
      "
      INSERT INTO Produkter (Beskrivelse)
      VALUES ($Beskrivelse)
      ";
      $stmt = sqlsrv_query($link, $sql);
    }
    else
    {
        echo "Post not received.";
    }
    header("Location: http://144.127.128.203/functions/lager/lagerMeny.php"); /* Redirect browser */
?>
