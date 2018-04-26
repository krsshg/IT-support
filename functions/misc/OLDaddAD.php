<?php
session_start();
include("../connect.php");
if (isset($_POST['adUsername']))
  {
  $adUser = $_POST['adUsername'];
  echo "inne i IF";
  echo $adUser;

  //kontakter ELkem domenet
  $ldap_connection = ldap_connect('elkem.com');

  if (! $ldap_connection){
    die("tilkoblingen mot Elkem domenet feilet!");
  }

  ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3);
  //ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0); // We need this for doing an LDAP search.


   function loginError($errno, $errstr){
     echo "<b> Error: </b> [$errno] $errstr<br>";
   }
   set_error_handler("loginError");
   error_reporting(E_ERROR | E_PARSE);

   $myusername = $_SESSION["ADusername"];
   $mypassword = $_SESSION["ADpassword"];
   $dn="CN=GLO-ACC-CiscoVPN-External,OU=Misc,OU=ECCOE Global Groups,DC=elkem,DC=com";
   $basedn="OU=ECCOE, DC=elkem, DC=com";

   $entry['memberUid'] = $adUser;
   ldap_modify($ldap_connection, $dn, $entry);
   Echo "$adUser added to AD group GLO-ACC-CiscoVPN-External";
/*
   //$bind = ldap_bind($ldap_connection, $myusername, $mypassword);
   if(! $bind){//autentiserer bruker
     loginError(8, "Kunne ikke logge på elkem.com. Prøv igjen");

   }else {

          $dn="CN=GLO-ACC-CiscoVPN-External,OU=Misc,OU=ECCOE Global Groups,DC=elkem,DC=com";
          $basedn="OU=ECCOE, DC=elkem, DC=com";

          $entry['memberUid'] = $adUser;
          ldap_mod_add($ldap_connection, $dn, $entry);
          Echo "$adUser added to AD group GLO-ACC-CiscoVPN-External";

echo "bind ok";

//          $res = ldap_search($ldap_connection, $basedn, $filter);
          //inneholder all data om brukeren i assosiated array
//          $resdump = ldap_get_entries($ldap_connection, $res);

//          $_SESSION["givenname"] = $resdump[0]['cn'][0];
//          $_SESSION["ADusername"] = $myusername;
//          $_SESSION["ADpassword"] = $mypassword;
          //header("Location: extVPNmeny.php");

   }*/
  }
  else{

    echo "AD username not set";
    exit();
  }
