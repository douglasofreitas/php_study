<?php
var_dump($_POST);

$configuration = array();
$configuration['currentValue'] = $_POST['value'];

$myfile = fopen("configuration.txt", "w") or die("Unable to open file!");
$txt = json_encode($configuration);
fwrite($myfile, $txt);
fclose($myfile);
