<?php
session_start();
//$url = "https://itsupport.elkem.com/rest/api/2/issue/EGS-20195?expand=names,renderfields";
$url = "https://itsupport.elkem.com/rest/api/2/search?jql=project+%3D+EGS+AND+issuetype+%3D+%22Infra+Request%22+AND+status+%3D+%22Waiting+for+Line+Manager+approval%22+AND+%22Level+1+team%22+%3D+%22Elkem+support%22&amp;expand%3Dschema,names";
//$content = json_encode("project = EGS AND issuetype = "Infra Request" AND status = "Waiting for Line Manager approval" AND "Level 1 team" = "Elkem support"");
$jsonstring= "curl -D- -X GET -H 'Content-Type: application/json' https://itsupport.elkem.com/rest/api/2/search?jql=issuekey=EGS-11784";
/*
$content2=
{
    "fields": {
       "project":
       {
          "key": "EGS-11784"
       },
       "summary": "REST ye merry gentlemen.",
       "description": "Creating of an issue using project keys and issue type names using the REST API",
       "issuetype": {
          "name": "Bug"
       }
   }
}
;
*/

//finne line manager i EGS-11784
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
//curl_setopt($curl, CURLOPT_POST, true);
//curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$username=$_SESSION["ADusername"];
//var_dump($username);
$password = $_SESSION["ADpassword"];

curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $password);

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
echo $status;
if ( $status != 200 ) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}


$response = json_decode($json_response, true);
//var_dump($response);
//echo '<pre>'; print_r($response); echo '</pre>';
//echo $response['issues']['fields']['customfield_10134']['emailAddress'];
print_r(array_keys($response));
curl_close($curl);


/*
$response = file_get_contents("https://itsupport.elkem.com/rest/api/2/search?jql=issuekey=EGS-11784");
$response = json_decode($response);
var_dump($response);
*/

?>
