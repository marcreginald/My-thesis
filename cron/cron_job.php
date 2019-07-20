#!/usr/bin/php -q
<?php 
$content = file_get_contents("http://192.168.1.5/tesda_affiliated_school/Cron_job/send_email");
echo $content;
 ?>