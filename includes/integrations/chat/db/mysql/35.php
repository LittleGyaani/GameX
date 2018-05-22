<?php

$content = <<<EOD

ALTER TABLE `cometchat_users` ADD `credits` INT(11) NOT NULL DEFAULT '0' ;

REPLACE INTO `cometchat_settings` (setting_key,value,key_type) values ('dbversion','35','1');

EOD;
$q = preg_split('/;[\r\n]+/',$content);
if(!isset($errors)){
   $errors='';
}
foreach ($q as $query) {
  if (strlen($query) > 4) {
    if (!sql_query($query, array(), 1)) {
      $errors .= sql_error($dbh)."<br/>\n";
    }
  }
}
removeCachedSettings($client.'settings');
