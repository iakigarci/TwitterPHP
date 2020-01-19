<?php
$ConsumerKeyAPIKey="uujXD9ZNcyvwYs0yuRChCEvsX";
$ConsumerSecretAPISecret="FAbpadIlU2pEUq3Wnofza4pnS62w7vl2TCZVuownjViFo0YA16";
$access_token = "1066992945822339072-K15rJgOvn1p2IsyryOZh24OjM79Rml";
$access_token_secret = "HTbIM0CsDLCpAREOvRC5V8PQ7WJoIb2Udc9QEErVEsK3f";

$NumberOfTags=15; //keep as minimum as possible
$GeoLocleID="20070458";
require "../twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
$connection = new TwitterOAuth($ConsumerKeyAPIKey, $ConsumerSecretAPISecret, $access_token, $access_token_secret);
$statues = $connection->get("trends/place", ["id" => $GeoLocleID]);
$stringgerr="";
$i=1;
foreach($statues as $hash)
{    $inner=$hash->trends;
    foreach($inner as $in)
    {
        
        $value=$in->name;
        
        if (strpos($value, '#') !== false) {
        $value=$value;
        } else {
        $value="#".$value;
        }
        $stringgerr.=str_replace(" ","_",$value)." ";
        echo "<li class='list-group-item'> $i - $value</li>";
        
        if($i==$NumberOfTags)
        break;
        $i++;
    }
    if($i==$NumberOfTags)
        break;
}

