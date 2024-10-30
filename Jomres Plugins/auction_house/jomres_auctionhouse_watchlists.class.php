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

class jomres_auctionhouse_watchlists
	{
	private static $configInstance;
	private static $internal_debugging;
	
	public function __construct() 
		{
		self::$internal_debugging = false;
		$this->auctions = array();
		}

	public static function getInstance()
		{
		if (!self::$configInstance)
			{
			self::$configInstance = new showtime();
			}
		return self::$configInstance;
		}
		
	public function __clone()
		{
		trigger_error('Cloning not allowed on a singleton object', E_USER_ERROR);
		}
		
	public function __set($setting,$value)
		{
		if (self::$internal_debugging)
			echo "Setting ".$setting." to ".$value." <br>";
		$this->$setting = $value;
		return true;
		}
		
	public function __get($setting)
		{
		if (self::$internal_debugging)
			echo "Getting ".$setting." which is ".$this->$setting."<br>";
		if (isset($this->$setting))
			return $this->$setting;
		return null;
		}
	
	function add_auction_to_watchlist($auction_id,$watchlist_id,$cms_user_id)
		{
		$result = array("auctioninserted"=>false,"reason"=>"Unknown");
		if ($cms_user_id ==0)
			return array("auctioninserted"=>false,"reason"=>"CMS user id not passed");
		if ($auction_id == 0)
			return array("auctioninserted"=>false,"reason"=>"Auction id not passed");
			
		jr_import('jomres_auction_watchlist');
		$watchlist = new jomres_auction_watchlist();
		
		if ($watchlist_id == 0)
			{
			$watchlist->cms_user_id = (int)$cms_user_id;
			$watchlist->listname = jr_gettext('_JOMRES_AUCTIONHOUSE_DEFAULTLIST','_JOMRES_AUCTIONHOUSE_DEFAULTLIST',false,false);
			$watchlist->commitNewWatchlist();
			$watchlist_id = $watchlist->id;
			}
		else
			{
			$watchlist->id = $watchlist_id;
			$watchlist->getWatchlist();
			if ((int)$watchlist->cms_user_id != (int)$cms_user_id )
				return array("auctioninserted"=>false,"reason"=>"List does not belong to user ");
			}
		$query = "SELECT id FROM #__jomres_auctionhouse_lists_auction_xref WHERE `auction_id` = ".(int)$auction_id." AND `list_id` = ".(int)$watchlist_id;
		$result=doSelectSql($query);
		if (!empty($result))
			return array("auctioninserted"=>false,"reason"=>"Item already in that list");
		
		$query = "INSERT INTO #__jomres_auctionhouse_lists_auction_xref (`auction_id`,`list_id`) VALUES (".(int)$auction_id.",".(int)$watchlist_id.")";
		$result = doInsertSql($query,'');
		if ($result)
			return array("auctioninserted"=>true,"reason"=>"Auction added to list");
		
		}
	
	function get_auctions_for_watchlist_id($watchlist_id)
		{
		$auctions_array = array();
		$query = "SELECT auction_id FROM #__jomres_auctionhouse_lists_auction_xref WHERE `list_id` = ".(int)$watchlist_id;
		$result=doSelectSql($query);
		if (!empty($result))
			{
			foreach ($result as $r)
				{
				$auctions_array[$r->auction_id]			= $r->auction_id;
				}
			}
		return $auctions_array;
		}
	
	function build_watchlist_dropdown($cms_user_id)
		{
		$dropdown = '';
		$lists = $this->get_users_watchlists($cms_user_id);
		if (!empty($lists))
			{
			$users_lists = array();
			foreach ($lists as $list)
				{
				$users_lists [] = jomresHTML::makeOption( $list['id'], $list['listname'] );
				}
			$dropdown = jomresHTML::selectList( $users_lists, 'watchlist', '  id="watchlist"', 'value', 'text', $model['force'] );
			}
		else
			{
			$users_lists [] = jomresHTML::makeOption( 0, jr_gettext('_JOMRES_AUCTIONHOUSE_DEFAULTLIST','_JOMRES_AUCTIONHOUSE_DEFAULTLIST',false,false) );
			$dropdown = jomresHTML::selectList( $users_lists, 'watchlist', '  id="watchlist" ', 'value', 'text', 0 );
			}
		return $dropdown;
		}
	
	function get_users_watchlists($cms_user_id)
		{
		$list_array = array();
		$query = "SELECT id,cms_user_id,listname FROM #__jomres_auctionhouse_lists WHERE cms_user_id = ".(int)$cms_user_id;
		$result=doSelectSql($query);
		if (count($result)>0)
			{
			foreach ($result as $r)
				{
				$list_array[$r->id]['id'		]			= $r->id;
				$list_array[$r->id]['cms_user_id']			= $r->cms_user_id;
				$list_array[$r->id]['listname']				= $r->listname;
				}
			}
		return $list_array;
		}
	
	function get_count_for_users_watchlist($watchlist_id)
		{
		$query = "SELECT id FROM #__jomres_auctionhouse_lists_auction_xref WHERE list_id = ".(int)$watchlist_id;
		return count(doSelectSql($query));
		}
	
	
	}
