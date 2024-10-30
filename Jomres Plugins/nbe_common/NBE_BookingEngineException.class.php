<?php


class NBE_BookingEngineException extends Exception
{
	function __construct($error)
	{
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();

		$context = 'HTML';
		if (defined('API_STARTED') && API_STARTED == true) {
			$context = 'api';
		}

		if ($context == 'api') {
			$lines = array();
			if ($jrConfig['development_production'] == 'development') {
				$backtrace = debug_backtrace();
				foreach ( $backtrace as $trace) {
					$lines[] = $trace["file"]. ' at Line '.$trace["line"];
				}
			}
			Flight::halt(400, $error , '', $lines );
		} else {

			if ($jrConfig['development_production'] == 'development') {
				echo $error.'
			';
				$backtrace = debug_backtrace();
				var_dump($backtrace);
				exit;
			}
		}
	}
}


