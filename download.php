
<?php

$download = "remembered";
$value = "yes";
$expiry = time() + (7 * 24 * 60 * 60);
setcookie($download, $value, $expiry); 

$time = "expiry";
$time_until = time() + (7 * 24 * 60 * 60);
$expiry = time() + (7 * 24 * 60 * 60);
setcookie($time, $time_until, $expiry);


$filepath = $_SERVER['DOCUMENT_ROOT']."/php1_hmwk/lesson13/software.txt";
if (file_exists($filepath)) {
   header("Content-Type: text/plain");
   header("Content-Disposition:filename=\"software.txt\"");
   $fd = fopen($filepath,'rb');
   fpassthru($fd);
   fclose($fd);
}

?>