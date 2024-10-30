<?php


	class NBE_User
	{
		public function __construct()
		{
			$thisJRUser = jomres_getSingleton('jr_user');
			$this->User = $thisJRUser;
		}

		public function get_user()
		{
			return $this->User;
		}

		function __destruct()
		{

		}
	}

