<?php
	/**
	 * Jomres CMS Agnostic Plugin
	 * @author Woollyinwales IT <sales@jomres.net>
	 * @version Jomres 9
	 * @package Jomres
	 * @copyright	2005-2015 Woollyinwales IT
	 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
	 **/

// ################################################################
	defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################


	class j16000do_data_wipe
	{
		function __construct()
		{
			$MiniComponents =jomres_getSingleton('mcHandler');
			if ($MiniComponents->template_touch)
			{
				$this->template_touchable=false; return;
			}

			$tables_array = array();

			$query = "SELECT `table_name` FROM information_schema.tables WHERE 
				`table_schema` = '".get_showtime('db')."'
				AND (`table_name` LIKE '#__jomres_%' 
				OR `table_name` LIKE '#__jomcomp_%' 
				OR `table_name` LIKE '#__jomresportal_%') ";

			$tables = doSelectSql($query);

			$db_prefix = get_showtime('dbprefix');
			$existing_tables = array();
			foreach ($tables as $table) {
				$table_name = str_replace ( $db_prefix , '#__' , $table->TABLE_NAME);
				if ($table_name == '' ) {
					$table_name = str_replace ( $db_prefix , '#__' , $table->table_name);
				}
				if ($table_name != '' )	{
					$existing_tables[] = $table_name;
				}
			}

			$tables_array[] = '#__jomcomp_mufavourites';
			$tables_array[] = '#__jomcomp_notes';
			$tables_array[] = '#__jomresportal_invoices';
			$tables_array[] = '#__jomresportal_invoices_transactions';
			$tables_array[] = '#__jomresportal_lineitems';
			$tables_array[] = '#__jomresportal_subscribers';
			$tables_array[] = '#__jomresportal_subscriptions';
			$tables_array[] = '#__jomres_audit';
			$tables_array[] = '#__jomres_audit_archive';
			$tables_array[] = '#__jomres_booking_data_archive';
			$tables_array[] = '#__jomres_contracts';
			$tables_array[] = '#__jomres_guests';
			$tables_array[] = '#__jomres_guest_profile';
			$tables_array[] = '#__jomres_pcounter';
			$tables_array[] = '#__jomres_room_bookings';
			$tables_array[] = '#__jomres_extraservices';
			$tables_array[] = '#__jomres_sessions';
			$tables_array[] = '#__jomres_webhook_events';

			$tables_array[] = '#__jomres_auctionhouse_bids';
			$tables_array[] = '#__jomres_gdpr_optins';
			$tables_array[] = '#__jomres_guest_reviews';
			$tables_array[] = '#__jomres_jintour_tour_bookings';

			$tables_array[] = '#__jomres_beds24_contract_booking_number_xref';
			$tables_array[] = '#__jomres_beds24_transaction_log';

			$tables_array[] = '#__jomres_invoice_pii_buyers';
			$tables_array[] = '#__jomres_invoice_pii_sellers';

			$tables_array[] = '#__jomres_invoice_payment_ref';
			$tables_array[] = '#__jomres_messages_group';
			$tables_array[] = '#__jomres_messages_message';
			$tables_array[] = '#__jomres_messages_message_recipient';
			$tables_array[] = '#__jomres_messages_reminder_frequency';
			$tables_array[] = '#__jomres_messages_user_group';

			$tables_array[] = '#__jomres_oauth_access_tokens';
			$tables_array[] = '#__jomres_oauth_authorization_codes';
			$tables_array[] = '#__jomres_oauth_clients';
			$tables_array[] = '#__jomres_oauth_refresh_tokens';
			$tables_array[] = '#__jomres_oauth_scopes';

			$tables_array[] = '#__jomres_syndication_distances';
			$tables_array[] = '#__jomres_syndication_domains';
			$tables_array[] = '#__jomres_syndication_properties';
			$tables_array[] = '#__jomres_webhook_events';

			$tables_array[] = '#__jomres_channelmanagement_framework_bookings_xref';
			$tables_array[] = '#__jomres_channelmanagement_framework_changelog_queue_items';
			$tables_array[] = '#__jomres_channelmanagement_framework_channels';
			$tables_array[] = '#__jomres_channelmanagement_framework_mapping';
			$tables_array[] = '#__jomres_channelmanagement_framework_plugins_user_accounts';
			$tables_array[] = '#__jomres_channelmanagement_framework_property_uid_xref';
			$tables_array[] = '#__jomres_channelmanagement_framework_rooms_xref';

			foreach ($tables_array as $table) {
				//$db_prefix = get_showtime('dbprefix');//
				if (in_array($table,$existing_tables)) {
					echo jr_gettext('_JOMRES_DATAWIPE_EMPTYING','_JOMRES_DATAWIPE_EMPTYING',false)." ".$table." ";
					$query = $query = "truncate table ".$table;
					$result = doInsertSql($query);

					if ($result)
						echo "<div class='alert alert-success'>".jr_gettext('_JOMRES_DATAWIPE_EMPTYING_SUCCESS','_JOMRES_DATAWIPE_EMPTYING_SUCCESS',false)."</div>";
					else
						echo "<div class='alert alert-error'>".jr_gettext('_JOMRES_DATAWIPE_EMPTYING_FAILURE','_JOMRES_DATAWIPE_EMPTYING_FAILURE',false)."</div>";

					echo "<br />";
				}
			}
		}

		// This must be included in every Event/Mini-component
		function getRetVals()
		{
			return null;
		}
	}