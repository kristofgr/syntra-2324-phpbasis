<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = "https://api.disneyapi.dev/character?pageSize=50&name=".urlencode("Wall");

$curl_handle = curl_init();

curl_setopt($curl_handle, CURLOPT_URL, $url);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);

$curl_data = curl_exec($curl_handle);
curl_close($curl_handle);

$curl_data = json_decode($curl_data);
$characters = $curl_data->data;

// if ($curl_data->info->count == 1) {
//   $characters = [$characters];
// }

if(!is_array($characters)) {
  $characters = [$characters];
}

// print '<pre>';
// print_r($curl_data);
// exit;



foreach($characters as $char) {
  print $char->name.' - '.$char->_id;
  print '<br>';
}