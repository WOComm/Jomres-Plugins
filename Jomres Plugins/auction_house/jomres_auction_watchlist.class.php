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

class jomres_auction_watchlist
	{
	function __construct()
		{
		$this->id					= 0;
		$this->cms_user_id			= 0;
		$this->listname				= '';
		$this->error				= null;
		}

	function getWatchlist()
		{
		if ($this->id > 0 )
			{
			$query = "SELECT id,cms_user_id,listname FROM #__jomres_auctionhouse_lists WHERE `id`='$this->id' LIMIT 1";
			$result=doSelectSql($query);
			if ($result && count($result)==1)
				{
				foreach ($result as $r)
					{
					$this->cms_user_id			= $r->cms_user_id;
					$this->listname				= $r->listname;
					}
				return true;
				}
			else
				{
				if (empty($result))
					{
					$this->error = "No watchlists were found with that id";
					return false;
					}
				elseif (count($result)> 1)
					{
					$this->error = "More than one watchlist was found with that id";
					return false;
					}
				}
			}
		else
			{
			$this->error = "ID of watchlist not set";
			return false;
			}

		}

	function commitNewWatchlist()
		{
		if ($this->id < 1 )
			{
			$query="INSERT INTO #__jomres_auctionhouse_lists
				(
				`cms_user_id`,
				`listname`
				)
				VALUES
				(
				'$this->cms_user_id',
				'$this->listname'
				)";
			$result = doInsertSql($query,'');
			if ($result)
				{
				$this->id=$result;
				return true;
				}
			else
				{
				$this->error = "ID of watchlist could not be found after apparent successful insert";
				return false;
				}
			}
		$this->error = "ID of watchlist already available. Are you sure you are creating a new watchlist?";
		return false;
		}

	function commitUpdateWatchlist()
		{
		if ($this->id > 0 )
			{
			$query="UPDATE #__jomres_auctionhouse_lists SET
				`cms_user_id` 		= '$this->cms_user_id',
				`listname`			= '$this->listname'
				WHERE `id`='$this->id'";
			return doInsertSql($query,'');
			}
		$this->error = "ID of watchlist not available";
		return false;
		}

	function deleteWatchlist()
		{
		if ($this->id > 0 )
			{
			$query="DELETE FROM #__jomres_auctionhouse_lists WHERE `id` = ".(int)$this->id;
			$result=doInsertSql($query,"");
			if ($result)
				{
				return true;
				}
			else
				{
				error_logging(  "Could not delete watchlist.");
				return false;
				}
			}
		error_logging(  "ID of watchlist not available");
		return false;
		}
	}
