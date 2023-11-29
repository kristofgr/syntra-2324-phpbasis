<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = "https://api.disneyapi.dev/character";

$curl_handle = curl_init();

curl_setopt($curl_handle, CURLOPT_URL, $url);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);

$curl_data = curl_exec($curl_handle);
curl_close($curl_handle);

$curl_data = json_decode($curl_data);
$characters = $curl_data->data;

foreach ($characters as $char) {
  print $char->name;
  print '<br>';
}