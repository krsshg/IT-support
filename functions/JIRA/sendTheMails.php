<?php
include 'sendMailFunc.php';
include 'getLineManagersFunc.php';
include '../dbConnect.php';

$alleLineManagers= getLineManagers();
sendMailLineManager($alleLineManagers);
$aLink= db_connect();
settDato($aLink);
header("Location: ../functions/JIRA/jiraMeny.php");
?>
