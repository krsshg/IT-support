<?php
include("../connect.php");
session_start();

//kontakter ELkem domenet
$ldap_connection = ldap_connect('elkem.com');

if (! $ldap_connection){
  die("tilkbolingen mot Elkem domenet feilet!");
}


if($_SERVER["REQUEST_METHOD"] == "POST") {

  ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3);
  ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0); // We need this for doing an LDAP search.

   // username and password sent from form
   $myusername = $_POST['Username'];
   $mypassword = $_POST['pass'];

   //$admValidation = substr($myusername, 0, 3);

   //sjekker om det er vanlig bruker eller ikke


   function loginError($errno, $errstr){
     echo "<b> Error: </b> [$errno] $errstr<br>";
   }
   set_error_handler("loginError");
   error_reporting(E_ERROR | E_PARSE);
   $bind = ldap_bind($ldap_connection, $myusername, $mypassword);

  if(! $bind){//autentiserer bruker
     loginError(8, "Kunne ikke logge på elkem.com. Prøv igjen");

   }else {

     //   fjerne @elkem.com fra username -tar bort 10 tegn starter bakfra
          $samaccountname = substr($myusername, 0,-10);
     //filter på username og kontotype(vanlig bruker)
     //$filter="(&(sn=Pedersen)(objectclass=user))";
          $filter="(&(sAMAccountName=$samaccountname)(objectclass=user))";

     //hvilket OU som søket skal starte fra
          $basedn="OU=ECCOE, DC=elkem, DC=com";

          $res = ldap_search($ldap_connection, $basedn, $filter);
          //inneholder all data om brukeren i assosiated array
          $resdump = ldap_get_entries($ldap_connection, $res);

          $_SESSION["givenname"] = $resdump[0]['cn'][0];
          $_SESSION["ADusername"] = $samaccountname;
          $_SESSION["ADusernameFull"] = $myusername;
          $_SESSION["ADpassword"] = $mypassword;

          $admlevel = substr($myusername, 0, 3);
          if ($admlevel == "adm"){
            $_SESSION["userlevel"] = "1";
          }else{
            $_SESSION["userlevel"] = "0";
          }

          header("location: ../../index.php");
        }
      }
      ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action = "" method = "post">
					<span class="login100-form-title">
						KRS IT Support Login
						<p> For å få tilgang til IT support sidene må du logge deg på med din AD bruker
					 </p>
					</span>


					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="Username" placeholder="ex: krsitsup@elkem.com">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button id="btn-spin" class="login100-form-btn">
							Login
						</button>
					</div>
          <br><br><br><br><br><br><br><br>
<!--
					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>
					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>

        -->
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>
