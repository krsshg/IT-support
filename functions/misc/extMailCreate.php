<?php
   //include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script>
function addAD(){
    var request = $.ajax({
      url: 'addUserToGroup.php',
      data: $("#adUsr").serialize(),
      type: 'POST',
  });

  request.done( function ( data ) {
    $('#outputID').html( data );
  });

  request.fail( function ( jqXHR, textStatus) {
    console.log( 'Sorry: ' + textStatus );
  });
}

function createIPplanStr(){
  var company = document.getElementById("company").value;
  var sponsor = document.getElementById("sponsor").value;
  var mailadr = document.getElementById("mailadr").value;
  var tlf = document.getElementById("tlf").value;
  alert(mailadr);
  alert(tlf);
alert (company);
    var request = $.ajax({
      url: 'createIPplanStr.php',
      data: { company: company, sponsor: sponsor, mailadr: mailadr, tlf: tlf },
      type: 'POST',
  });

  request.done( function ( data ) {
    $('#outputIDipplan').html( data );
  });

  request.fail( function ( jqXHR, textStatus) {
    console.log( 'Sorry: ' + textStatus );
  });
}
</script>

</head>
<body>
  <?php

   ?>
Fullname: <input type="text" name="fullname"><br><br>
Company:<input type="text" name="company" id="company"><br><br>
Sponsor:<input type="text" name="sponsor" id="sponsor"><br><br>
Tlf#:<input type="text" name="tlf" id="tlf"><br><br>
Mailadresse:<input type="text" name="mailadr" id="mailadr"><br><br>
EGS #:<input type="text" name="egs"><br><br>
IP'address:<input type="text" name="ip"><br><br>
<button id = 'addADBtn' onClick = "createIPplanStr()">Create ipplan text</button><br><br>
<div id="outputIDipplan"></div><br><br><br>
Password: <input type="text" name="password"><br><br>

AD Username:<input type="text" name="adUsername" id="adUsr"><br><br>
<button id = 'addADBtn' onClick = "addAD()">Add to AD group GLO-ACC-CiscoVPN-External</button><br><br>
<div id="outputID"></div><br><br><br>
created by session Username


extMailData

<ul>
  <li>Create AD account</li>
  <li>Finn passende IP i <a href="http://ipplan.elkem.com/">IPPLAN</a></li>


  <li>add to AD group GLO-ACC-CiscoVPN-External</li>
  <li>set static IP</li>
  <li>Dial-in</li>
  <li>-call back to 255.255.254.0</li>
  <li>-assign static IPv4</li>
  <li>assign saken videre til nettverk</li>
  <li>(skrive alt til textfil for mailen?)</li>
  <li>-mail brukerinfo</li>
  <li></li>
</ul>
<br><br><br>

<p>E-mail template:</p><br>
<p>To: User</p><br>
<p>Copy: Sponsor</p><br>
<p>Subject: Elkem AS - VPN User</p><br><br>
<p>From: Elkem IT Support itsupport.krs@elkem.com</p><br><br>
<textarea style="margin: 0px; height: 766px; width: 807px;">


<h1>Dear NAME,</h1>



<h2>Case #: xxxx (Ref. to Elkem Support Ticket)</h2>



Your personal VPN connection to Elkem AS has now been created.



To download the client, please visit the following address in Internet Explorer:
https://corporate.elkem.com/external
Follow the instructions to install the client.



After installing the client, please be sure that the client is connecting to: corporate.elkem.com/external

Press Connect.



User must change password at first logon.
Your account password is valid for 90 days.



Username: USERNAME

Password: TEMPORARY-PASSWORD



For help or problems regarding Elkem systems, please contact Elkem Service Desk at (+47) 380 17 222.
</textarea>

</body>
