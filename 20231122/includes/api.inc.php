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
