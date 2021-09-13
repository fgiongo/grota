<?php
$str = $_POST["str"];
$computedStr = "The string received was: ".$str;
$array = ["str" => $str, "computedStr" => $computedStr];
$logFile = fopen("ajax-log.txt", "w");
echo json_encode($array);
fwrite($logFile, $computedStr);
fclose($logFile);
?>