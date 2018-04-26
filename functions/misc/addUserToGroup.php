<?php
session_start();

$ldap_connection = ldap_connect('elkem.com');

if (! $ldap_connection){
  die("tilkoblingen mot Elkem domenet feilet!");
}
ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0); // We need this for doing an LDAP search.

//$myusername = $_SESSION["ADusernameFull"];
$myusername = "admkrsomp@elkem.com";
//$mypassword = $_SESSION["ADpassword"];
$mypassword = "";
function loginError($errno, $errstr){
  echo "<b> Error: </b> [$errno] $errstr<br>";
}
set_error_handler("loginError");
error_reporting(E_ERROR | E_PARSE);

$bind = ldap_bind($ldap_connection, $myusername, $mypassword);
if(! $bind){//autentiserer bruker
  loginError(8, "Kunne ikke logge på elkem.com. Prøv igjen");
}else {
  //hvilket OU som søket skal starte fra
$basedn="OU=ECCOE, DC=elkem, DC=com";
$groupdn= "OU=Groups,OU=KRS,OU=ECCOE,DC=elkem,DC=com";
//CN=KRS-ACC-TestGruppe,OU=Groups,OU=KRS,OU=ECCOE,DC=elkem,DC=com
$userSamaccountname = $_POST["adUsername"];
//filter på username og kontotype(vanlig bruker)
$userFilter="(&(sAMAccountName=$userSamaccountname)(objectclass=user))";
//inneholder all data om brukeren i assosiated array
$userRes = ldap_search($ldap_connection, $basedn, $userFilter);
$resdump = ldap_get_entries($ldap_connection, $userRes);
$userDN = $resdump[0]['distinguishedname'][0];
var_dump($resdump);

$groupSamaccountname="KRS-ACC-TestGruppe";
$groupFilter="(&(sAMAccountName=$groupSamaccountname)(objectclass=group))";
$groupRes = ldap_search($ldap_connection, $groupdn, $groupFilter);
$resdump2 = ldap_get_entries($ldap_connection, $groupRes);
$groupDN = $resdump2[0]['distinguishedname'][0];



$arr['member'] = $userDN;
//ldap_mod_add($ldap_connection, $groupDN, $arr);
/*

if(!@ldap_mod_add($ldap_connection, $groupDN, $arr)){
  echo "ikke oppdatert";
}else {
  echo "oppdatert ok";
};
*/

//$filter="(&(sn=Pedersen)(objectclass=user))";



//$groupDN = $resdump2[0]['distinguishedname'][0];
//echo $groupDN;
/*
hente dn til brukerobjektet (eks CN=Ole Markus Pedersen,OU=Users,OU=KRS,OU=ECCOE,DC=elkem,DC=com)
så hente dn til gruppeobjektet (CN=GLO-ACC-CiscoVPN-External,OU=Misc,OU=ECCOE Global Groups,DC=elkem,DC=com)
så lese member fra gruppeobjekt over -> memberstring
så legge til brukerdn i memberstring
(mod_replace)så oppdatere gruppeobjekt med ny memberstring
*/
echo "<pre>";
//print_r($resdump);
echo "</pre>";
}
?>
