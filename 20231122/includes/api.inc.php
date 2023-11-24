<?php
function getOGFromUrl(string $url_to_fetch): object|bool
{
  $url = "https://opengraph.io/api/1.1/site/" . urlencode($url_to_fetch) . "?app_id=" . APP_ID;

  $curl_handle = curl_init();
  curl_setopt($curl_handle, CURLOPT_URL, $url);
  curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);

  $curl_data = curl_exec($curl_handle);
  curl_close($curl_handle);

  $response = json_decode($curl_data);

  if ($response === null)
    return false;

  return $response;
}


function getScreenshotFromUrl(string $url_to_fetch): string
{
  $url = "https://api.apiflash.com/v1/urltoimage?access_key=" . FLASH_ACCESS_KEY . "&url=" . urlencode($url_to_fetch) . "&format=png&width=800&height=600&response_type=image";

  // $curl_handle = curl_init();
  // curl_setopt($curl_handle, CURLOPT_URL, $url);
  // curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
  // curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);

  // $curl_data = curl_exec($curl_handle);
  // curl_close($curl_handle);

  $filename = "images/" . generateRandomString(25) . "_" . time() . ".png";
  $curl_data = file_get_contents($url);

  file_put_contents($filename, $curl_data);

  return $filename;
}

function generateRandomString($length = 10)
{
  return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}