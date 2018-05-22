<?php

$imageURL = '';
if(!empty($client)){
	if(defined('STATIC_CDN_URL')){
		$imageURL = STATIC_CDN_URL;
	}
}

$content = <<<EOD

INSERT INTO `cometchat_users`(`username`, `displayname`, `password`, `avatar`, `link`, `grp`, `friends`, `uid`, `role`) VALUES ('Iron Man','Iron Man','','{$imageURL}images/ironman.png','','','','SUPERHERO1','default'),('Capitan America','Capitan America','','{$imageURL}images/capitanamerica.png','','','','SUPERHERO2','default'), ('Spiderman','Spiderman','','{$imageURL}images/spiderman.png','','','','SUPERHERO3','default'), ('Wolverine','Wolverine','','{$imageURL}images/wolverine.png','','','','SUPERHERO4','default'),('Cyclops','Cyclops','','{$imageURL}images/cyclops.png','','','','SUPERHERO5','default');

REPLACE INTO `cometchat_settings` (setting_key,value,key_type) values ('dbversion','36','1');

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
