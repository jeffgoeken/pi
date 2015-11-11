<?php

$output= shell_exec('crontab -e');
file_put_contents('/tmp/crontab.txt',$output.'* * * * * new_cron'.PHP_EOL);
echo exec('crontab /tmp/crontab.txt'); 
//echo exec('crontab -r');
