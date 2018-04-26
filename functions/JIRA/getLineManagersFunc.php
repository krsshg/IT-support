<?php
function getLineManagers(){
session_start();
//alle infra request saker over 3 dager gamle som er waiting for line manager approval
$url = "https://itsupport.elkem.com/rest/api/2/search?jql=project+%3D+EGS+AND+issuetype+%3D+%22Infra+Request%22+AND+status+%3D+%22Waiting+for+Line+Manager+approval%22+AND+%22Level+1+team%22+%3D+%22Elkem+support%22+AND+created+%3C%3D+-3d&amp;expand%3Dschema,names";
//$jsonstring= "curl -D- -X GET -H 'Content-Type: application/json' https://itsupport.elkem.com/rest/api/2/search?jql=issuekey=EGS-11784";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$username= $_SESSION["ADusername"];
$password = $_SESSION["ADpassword"];
curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $password);
$json_response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ( $status != 200 ) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}

$response = json_decode($json_response, true);
$teller = 0;
$emailArray = array();
foreach ($response['issues'] as $value){
//skrive emailadressen på index til nytt array
$StrippedResponse = $response['issues'][$teller]['fields']['customfield_10134']['emailAddress'];
$emailArray[] = $StrippedResponse;
$teller++;
};
curl_close($curl);
//lage string fra array med , seperator
$alleLineManagers = join(', ', $emailArray);
return $alleLineManagers;
}
?>
