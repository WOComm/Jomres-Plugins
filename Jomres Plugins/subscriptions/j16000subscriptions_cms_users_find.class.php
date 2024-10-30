<?php
	/**
	 * Core plugin.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 *  @version Jomres 10.7.0
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j16000subscriptions_cms_users_find
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}
		$search_string = trim( strtolower( jomresGetParam( $_REQUEST, 'term', '' ) ) );
		$all_users     = jomres_cmsspecific_getCMSUsers();

		$existing_subscribers 	= array ();
		$query             		= "SELECT `cms_user_id` FROM #__jomresportal_subscriptions ";
		$subscribersList   		= doSelectSql( $query );
		
		foreach ( $subscribersList as $subscriber )
			{
			$existing_subscribers[ ] = $subscriber->cms_user_id;
			}

		$results = array ();
		foreach ( $all_users as $user )
			{
			if ( strlen( stristr( strtolower( $user[ 'username' ] ), $search_string ) ) > 0 ) 
				$results[ ] = $user;
			}
		
		if ( empty( $results ) ) 
			echo "";
		else
			{
			$result_array = array ();
			$count        = count( $results );

			for ( $i = 0; $i <= $count; $i++ )
				{
				if ( isset($results[ $i ][ 'username' ]) && $results[ $i ][ 'username' ] !== null && !in_array( $results[ $i ][ 'id' ], $existing_subscribers ) )
					{
					$result_array[ $i ][ 'id' ] = $results[ $i ][ 'id' ];
					$result_array[ $i ][ 'username' ] = $results[ $i ][ 'username' ];
					}
				}

			echo json_encode( $result_array );
			exit;
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}