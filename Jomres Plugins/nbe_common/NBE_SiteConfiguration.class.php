<?php


	class NBE_SiteConfiguration
	{
		public function __construct()
		{
			$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
			$this->jrConfig = $siteConfig->get();
			return $this->jrConfig;
		}

		function __destruct()
		{

		}
	}

