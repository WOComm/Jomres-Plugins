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

class jomres_auction
	{
	function __construct()
		{
		$this->id					= 0;
		$this->title				= '';
		$this->description			= '';
		$this->value				= '';
		$this->reserve				= '';
		$this->end_value			= '';
		$this->buy_now_value		= '';
		$this->start_date			= '';
		$this->end_date				= '';
		$this->property_uid			= '';
		$this->cms_user_id			= '';
		$this->winner_cms_user_id	= 0;
		$this->lang					= 'en-GB';
		$this->blackbooking_id		= 0;
		$this->finished				= 0;
		
		$this->error				= null;
		}

	function getAuction()
		{
		if ($this->id > 0 )
			{
			$query = "SELECT id,title,description,value,reserve,end_value,buy_now_value,start_date,end_date,property_uid,cms_user_id,winner_cms_user_id,lang,blackbooking_id,finished FROM #__jomres_auctionhouse_auctions WHERE `id`='$this->id' LIMIT 1";
			$result=doSelectSql($query);
			if ($result && count($result)==1)
				{
				foreach ($result as $r)
					{
					$this->title				= $r->title;
					$this->description			= $r->description;
					$this->value				= $r->value;
					$this->reserve				= $r->reserve;
					$this->end_value			= $r->end_value;
					$this->buy_now_value		= $r->buy_now_value;
					$this->start_date			= $r->start_date;
					$this->end_date				= $r->end_date;
					$this->property_uid			= $r->property_uid;
					$this->cms_user_id			= $r->cms_user_id;
					$this->winner_cms_user_id	= $r->winner_cms_user_id;
					$this->lang					= $r->lang;
					$this->blackbooking_id		= $r->blackbooking_id;
					$this->finished				= $r->finished;
					
					
					}
				return true;
				}
			else
				{
				if (empty($result))
					{
					$this->error = "No auctions were found with that id";
					return false;
					}
				elseif (count($result)> 1)
					{
					$this->error = "More than one auction was found with that id";
					return false;
					}
				}
			}
		else
			{
			$this->error = "ID of auction not set";
			return false;
			}
		}

	function commitNewAuction()
		{
		if ($this->id < 1 )
			{
			$query="INSERT INTO #__jomres_auctionhouse_auctions
				(
				`title`,
				`description`,
				`value`,
				`reserve`,
				`end_value`,
				`buy_now_value`,
				`start_date`,
				`end_date`,
				`property_uid`,
				`cms_user_id`,
				`winner_cms_user_id`,
				`lang`,
				`blackbooking_id`,
				`finished`
				)
				VALUES
				(
				'".(string)$this->title."',
				'".(string)$this->description."',
				".(float)$this->value.",
				".(float)$this->reserve.",
				".(float)$this->end_value.",
				".(float)$this->buy_now_value.",
				'$this->start_date',
				'$this->end_date',
				".(int)$this->property_uid.",
				".(int)$this->cms_user_id.",
				".(int)$this->winner_cms_user_id.",
				'$this->lang',
				".(int)$this->blackbooking_id.",
				".(int)$this->finished."
				)";
			$result = doInsertSql($query,'');
			if ($result)
				{
				$this->id=$result;
				return true;
				}
			else
				{
				$this->error = "ID of auction could not be found after apparent successful insert";
				return false;
				}
			}
		$this->error = "ID of auction already available. Are you sure you are creating a new auction?";
		return false;
		}

	function commitUpdateAuction()
		{
		if ($this->id > 0 )
			{
			$query="UPDATE #__jomres_auctionhouse_auctions SET
				`title` 			= '".(string)$this->title."',
				`description` 		= '".(string)$this->description."',
				`value` 			= ".(float)$this->value.",
				`reserve` 			= ".(float)$this->reserve.",
				`end_value` 		= ".(float)$this->end_value.",
				`buy_now_value` 	= ".(float)$this->buy_now_value.",
				`start_date` 		= '$this->start_date',
				`end_date` 			= '$this->end_date',
				`property_uid` 		= ".(int)$this->property_uid.",
				`cms_user_id` 		= ".(int)$this->cms_user_id.",
				`winner_cms_user_id`= ".(int)$this->winner_cms_user_id.",
				`lang`				= '$this->lang',
				`blackbooking_id`	= ".(int)$this->blackbooking_id.",
				`finished`			= ".(int)$this->finished."
				WHERE `id`=".(int)$this->id;
			return doInsertSql($query,'');
			}
		$this->error = "ID of auction not available";
		return false;
		}

	function deleteAuction()
		{
		if ($this->id > 0 )
			{
			$query="DELETE FROM #__jomres_auctionhouse_auctions WHERE `id` = ".(int)$this->id;
			$result=doInsertSql($query,"");
			if ($result)
				{
				return true;
				}
			else
				{
				error_logging(  "Could not delete auction.");
				return false;
				}
			}
		error_logging(  "ID of auction not available");
		return false;
		}
		
	function markAuctionEndedNow()
		{
		if ($this->id > 0 )
			{
			$query="UPDATE #__jomres_auctionhouse_auctions SET
				`end_date` 			= NOW()
				WHERE `id`=".(int)$this->id;
			return doInsertSql($query,'');
			}
		}
	}
