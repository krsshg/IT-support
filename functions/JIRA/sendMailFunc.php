<?php
function sendMailLineManager($toBcc){

  $path=$_SERVER["DOCUMENT_ROOT"] . "../img/";
  $filename="LineManager.JPG";
  $file = $path.$filename;
  $content = file_get_contents($file);
  $content = chunk_split(base64_encode($content));
  $uid = md5(uniqid(time()));
  $name = basename($file);
  //sette headers
  $headers = "MIME-Version: 1.0" ."\r\n";
  $headers .= 'Reply-To: <itsupport.krs@elkem.no>' . "\r\n";
  $headers .= "BCC: " . $toBcc . "" . "\r\n";
  $headers .= 'From: Elkem IT Support<itsupport.krs@elkem.no>' . "\r\n";
  $headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

  $subject = "Linemanager in servicedesk ticket";
  $message = "
  <html>
  <head>
  <title>REMINDER: A user is waiting for you respone</title>
  </head>
  <body>
  <h2> Hello! </h2>

  <p>You have been assigned the role of 'Line Manager' in one of our servicedesk tickets.</p>
  <p>This means that a user has raised a request and is pending your approval. The request will not be handled by IT before we get your response. </p><br>
  <br>
  <p> To approve the ticket, please follow these steps: </br>
  <ol>
    <li><p>Click on the servicedesk icon on the desktop of your PC (or you can follow this link: <a>https://itsupport.elkem.com/servicedesk/customer/portal/</a>).</p></li>
    <li><p>In the top right corner, click 'Requests', and then 'Approvals'.(see attachment)</p></li>
    <li><p>Find the case that is pending your response, sorting by 'waiting for my Approval'</li>
    <li><p>Click approve or decline in the top section of the case.</p></li>
    </ol><br><br>
    <h3><p>Best regards, </p></h3>
    <h3><p>Elkem IT Support Kristiansand </p></h3>
  </body>
  </html>
";
// message & attachment
$nmessage = "--".$uid."\r\n";
$nmessage .= "Content-type:text/html; charset=iso-8859-1\r\n";
$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$nmessage .= $message."\r\n\r\n";
$nmessage .= "--".$uid."\r\n";
$nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
$nmessage .= "Content-Transfer-Encoding: base64\r\n";
$nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$nmessage .= $content."\r\n\r\n";
$nmessage .= "--".$uid."--";

mail($to, $subject, $nmessage, $headers);
}

//Hente ut siste dato fra tabell MailPurring
function hentDato($link){

  $sql = "SELECT CONVERT(varchar, Dato, 103) AS Dato FROM MailPurring ORDER BY ID DESC";
  $stmt = sqlsrv_query($link, $sql);
  if( $stmt === false) {
      die( print_r( sqlsrv_errors(), true) );
  }
  $row_count = sqlsrv_num_fields( $stmt );
  if ($row_count === false)
    echo "Error in retrieveing row count.";
    else
   sqlsrv_fetch($stmt);
   $date = sqlsrv_get_field( $stmt, 0, SQLSRV_PHPTYPE_STRING("UTF-8"));
//   $sistMailDato = trim($date->format('d-m-Y'));
return $date;
 }
 //Sett dato ved utsendelse av mail
 function settDato($link){
  $insertSql = "INSERT INTO MailPurring(Dato) VALUES (GETDATE())";
  sqlsrv_query($link, $insertSql);
}

?>
