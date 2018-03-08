<?php

function loadConfiguration(){
  $myfile = fopen("configuration.txt", "r") or die("Unable to open file!");
  $content =  fread($myfile,filesize("configuration.txt"));
  fclose($myfile);
  return json_decode($content);
}

function getBitcoinValue(){
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.coindesk.com/v1/bpi/currentprice/BRL.json",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Cache-Control: no-cache",
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    return false;
  } else {
    return json_decode($response);
  }
}

function getBitcoinHistory() {
  
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.coindesk.com/v1/bpi/historical/close.json?currency=BRL",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Cache-Control: no-cache",
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    return false;
  } else {
    return json_decode($response);
  }
}

$currentStatus = loadConfiguration();
var_dump($currentStatus);
$bitconValue = getBitcoinValue();
//var_dump($bitconValue);
$bitconHistory = getBitcoinHistory();
//var_dump($bitconHistory);

var_dump(floatval($bitconValue->bpi->BRL->rate_float));
var_dump(floatval($currentStatus->currentValue));

if(floatval($bitconValue->bpi->BRL->rate_float) > floatval($currentStatus->currentValue)){
  echo 'HIGH: '.$bitconValue->bpi->BRL->rate_float;
}else{
  echo 'LOW: '.$bitconValue->bpi->BRL->rate_float;
}
