#!/usr/bin/php -q

<?php
$output = shell_exec('crontab -l');
file_put_contents('/tmp/crontab.txt', $output.'*/5 * * * * /home/jeff/pi/runplan.php plan1'.PHP_EOL);
echo exec('crontab /tmp/crontab.txt');
?>
