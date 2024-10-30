<?php

if (!defined('JOMRES_INSTALLER')) exit;

$cron =jomres_getSingleton('jomres_cron');
$cron->addJob("message_reminder","M","");
