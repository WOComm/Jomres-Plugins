<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class channelmanagement_framework_queue_handling
{
	
	function __construct()
	{
		$this->current_queue_unique_ids = array();
		$query = "SELECT id ,`channel_name`, `property_uid`, `unique_id`, `date_added`, `completed`, `attempts` , `item`  FROM #__jomres_channelmanagement_framework_changelog_queue_items";
		$this->queue_items_object = doSelectSql($query );
		if (!empty($this->queue_items_object)) { // When storing queue items, we need a quick way to see if the item already exists
			foreach ($this->queue_items_object as $item) {
				$this->current_queue_unique_ids[] = $item->unique_id;
			}
		}
	}


	/*
	 *
	 * Mark a changelog item completed
	 *
	 */
	public function complete_queue_item ( $item_id = 0  )
	{
		if ( !isset($item_id ) || (int)$item_id == 0 ) {
			throw new Exception( "item_id not set" );
		}

		$query = "UPDATE #__jomres_channelmanagement_framework_changelog_queue_items SET
						 `completed` = 1
						 WHERE 
						 `id` = ".(int)$item_id." 
						 LIMIT 1
						 ";
		doInsertSql($query);
	}

	public function increment_attempts ( $item_id = 0  )
	{
		if ( !isset($item_id ) || (int)$item_id == 0 ) {
			throw new Exception( "item_id not set" );
		}

		$query = "UPDATE #__jomres_channelmanagement_framework_changelog_queue_items SET
						 attempts = attempts + 1
						 WHERE 
						 `id` = ".(int)$item_id." 
						 LIMIT 1
						 ";
		doInsertSql($query);
	}
/*
 *
 * Get changelog queue items to be processed by 27410 scripts
 *
 */
	public function get_all_queue_items_for_property ( $property_uid = 0 )
	{
		if ( !isset($property_uid ) || (int)$property_uid == 0 ) {
			throw new Exception( "property_uid not set" );
		}

		$query = "SELECT id ,`channel_name`, `property_uid`, `unique_id`, `date_added`, `completed`, `attempts` , `item`  FROM #__jomres_channelmanagement_framework_changelog_queue_items WHERE property_uid = ".(int)$property_uid.' ORDER BY id';
		return doSelectSql($query );
	}

	/*
	 *
	 * Get changelog queue items to be processed by 27410 scripts
	 *
	 */
	public function get_queue_items ( )
	{
		return $this->queue_items_object;
	}


	/*
	 *
	 * Insert or update a queue item. If the item's unique id already exists for this property then just the item description and completed flag can be set
	 *
	 * Returns the id of the queue item
	 *
	 */
	public function store_queue_item ( $item , $update_item_if_exists = false )
	{

		if ( !isset($item['channel_name']) || $item['channel_name'] == '' ) {
			throw new Exception( "channel_name not set" );
		}

		if (!isset($item['local_property_id']) || $item['local_property_id'] == 0 ) {
			throw new Exception( "local_property_id not set" );
		}

		if (!isset($item['unique_id']) || $item['unique_id'] == '' ) {
			throw new Exception( "xxx not set" );
		}

		if (!isset($item['item']) ) {
			throw new Exception( "item not set" );
		}

		if (!isset($item['completed']) ) {
			$item['completed'] = false;
		}

		// See if the queue item already exists
		if ( !in_array( $item['unique_id'] , $this->current_queue_unique_ids ) ) {
			$this->current_queue_unique_ids[] = $item['unique_id'];
			$query = "INSERT INTO #__jomres_channelmanagement_framework_changelog_queue_items
						(
						`channel_name`,
						`property_uid`,
						`unique_id`,
						`date_added`,
						`completed`,
						`item`
						)
						VALUES 
						(
						'".$item['channel_name']."',
						".(int)$item['local_property_id'].",
						'".$item['unique_id']."',
						'".date("Y-m-d H:i:s")."',
						'".(int)$item['completed']."',
						'".base64_encode(serialize($item['item']))."'
						)
						";

			return doInsertSql($query);
		} elseif ($update_item_if_exists == true ) {
			$query = "UPDATE #__jomres_channelmanagement_framework_changelog_queue_items SET
						 `completed` = '".$item['completed']."', 
						 `item` = '".base64_encode(serialize($item['item']))."'
						 WHERE 
						 `unique_id` = '".$item['unique_id']."' AND
						 `property_uid` = ".(int)$item['local_property_id']." 
						 LIMIT 1
						 ";
			doInsertSql($query);
			return $item['unique_id'];
		}
		return false;
	}


}
