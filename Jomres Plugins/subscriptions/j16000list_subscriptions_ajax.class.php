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

class j16000list_subscriptions_ajax
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

		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();
		
		$package_id			= (int)jomresGetParam($_GET,'package_id', 0);
		$subscription_status= (int)jomresGetParam($_GET,'subscription_status',2);
		$cms_user_id		= (int)jomresGetParam($_GET,'cms_user_id',0);
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;

		$rows = array ();
		
		//set the table coulmns, in the exact order in which they`re displayed in the table
		$aColumns = array( 'a.id','a.id','c.enc_firstname','c.enc_surname','b.name','a.raised_date','a.expiration_date','a.invoice_id' );
		
		//set columns count
		$n = count($aColumns);

        /*
         * Paging
         */
        $sLimit = '';
        if (isset($_GET['start']) && $_GET['start'] != '-1') 
			{
            $sLimit = 'LIMIT '.(int)$_GET['start'].', '.(int)$_GET['length'];
			}

        /*
         * Ordering
         */
        $sOrder = '';
        if (isset($_GET['jr_order'])) 
			{
            $sOrder = 'ORDER BY ';
			for ($i = 0; $i < $n; ++$i) 
				{
				if (isset($_GET['jr_order'][$i]['column'])) 
					{
					$column_id = (int)$_GET['jr_order'][$i]['column'];
					$sOrder .= ''.$aColumns[$column_id].' '.($_GET['jr_order'][$i]['dir'] === 'asc' ? 'ASC' : 'DESC').', ';
					}
				}
			if ($sOrder == 'ORDER BY ') 
				{
				$sOrder = '';
				} 
			else 
				{
				$sOrder = rtrim($sOrder, ', ');
				}
			}

        /*
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        $sWhere = '';
		$search = jomresGetParam($_GET, 'jr_search', array());
        if (isset($search['value']) && $search['value'] != '') 
			{
            $sWhere = 'AND (';
            for ($i = 0; $i < $n; ++$i) 
				{
                $sWhere .= ''.$aColumns[$i]." LIKE '%".$search['value']."%' OR ";
				}
			$sWhere = rtrim($sWhere, ' OR ');
            $sWhere .= ')';
			}
		
		/*
		 * Prefilter
		 */
		
		$clause = "WHERE a.raised_date > '1970-01-01 00:00:01' ";

		//status
		if ($subscription_status != 2)
			$clause .="AND a.status = ".$subscription_status." ";
		
		//status
		if ($package_id > 0)
			$clause .="AND a.package_id = ".$package_id." ";
		
		//cms user id filter
		if ($cms_user_id > 0)
			$clause .="AND a.cms_user_id = ".$cms_user_id." ";
		
		/*
		 * Build and execute the query
		 */
		
		$query = "SET SQL_BIG_SELECTS=1";
		doInsertSql($query);
		
		$query = "SELECT SQL_CALC_FOUND_ROWS 
					a.id, 
					a.cms_user_id,
					a.package_id, 
					a.status, 
					a.raised_date, 
					a.expiration_date, 
					a.invoice_id, 
					b.name,
					c.enc_firstname,
					c.enc_surname
				FROM #__jomresportal_subscriptions a 
					LEFT JOIN #__jomresportal_subscriptions_packages b ON a.package_id = b.id 
					LEFT JOIN #__jomres_guest_profile c ON a.cms_user_id = c.cms_user_id "
				. $clause 
				. ' ' . $sWhere 
				. " GROUP BY a.id " 
				. $sOrder 
				. ' ' . $sLimit;
		$subscriptionsList = doSelectSql( $query );

		/*
         * Total number of rows
         */
        $query = 'SELECT FOUND_ROWS()';
        $mp = (int) doSelectSql($query, 1);
        if ($mp == 0) 
			{
            $output = array(
                'draw' => (int)$_GET['draw'],
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => array(),
                );
            echo json_encode($output);
            exit;
			}

        /*
         * Start building the output array. The columns data should be built in the exact order in which they`ll be displayed in the table.
         */
        $output = array(
            'draw' => (int)$_GET['draw'],
            'recordsTotal' => $mp,
            'recordsFiltered' => $mp,
            'data' => array(),
        );

		if (count($subscriptionsList) > 0 ) {
			foreach ( $subscriptionsList as $p )
				{
				$r = array ();

				switch ( $p->status )
					{
					case 0:
						$label_class='label-grey';
						break;
					case 1:
						$label_class='label-green';
						break;
					default:
						$label_class='label-grey';
						break;
					}
				
				if (!using_bootstrap())
					{
					$jrtbar = jomres_singleton_abstract::getInstance( 'jomres_toolbar' );
					$jrtb = $jrtbar->startTable();
					$jrtb .= $jrtbar->toolbarItem( 'edit', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=edit_subscription' . '&id=' . $p->id ), jr_gettext( 'COMMON_EDIT', 'COMMON_EDIT', false ) );
					$jrtb .= $jrtbar->toolbarItem( 'delete', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=delete_subscription' . '&id=' . $p->id ), jr_gettext( 'COMMON_DELETE', 'COMMON_DELETE', false ) );
					$r[] = $jrtb .= $jrtbar->endTable();
					}
				else
					{
					$toolbar = jomres_singleton_abstract::getInstance( 'jomresItemToolbar' );
					$toolbar->newToolbar();
					$toolbar->addItem( 'fa fa-pencil-square-o', 'btn btn-info', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=edit_subscription&id=' . $p->id ), jr_gettext( 'COMMON_EDIT', 'COMMON_EDIT', false ) );
					$toolbar->addSecondaryItem( 'fa fa-file-text', '', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=view_invoice&id=' . $p->invoice_id ), jr_gettext( '_JOMRES_MANAGER_SHOWINVOICE', '_JOMRES_MANAGER_SHOWINVOICE', false ) );
					$toolbar->addSecondaryItem( 'fa fa-trash-o', '', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=delete_subscription&id=' . $p->id ), jr_gettext( 'COMMON_DELETE', 'COMMON_DELETE', false ) );
					$r[]=$toolbar->getToolbar();
					}

				$r[] = '<span class="label '.$label_class.'">'.$p->id.'</span>';
				
				if ( !isset($p->firstname) || $p->firstname == '')
					$r[] = '-';
				else
					$r[] = '<a href="'.jomresUrl(JOMRES_SITEPAGE_URL_ADMIN.'&task=list_subscriptions&cms_user_id='.$p->cms_user_id).'">'.$this->jomres_encryption->decrypt($p->enc_firstname).'</a>';
					
				if ( !isset($p->surname) || $p->surname == '')
					$r[] = '-';
				else
					$r[] = '<a href="'.jomresUrl(JOMRES_SITEPAGE_URL_ADMIN.'&task=list_subscriptions&cms_user_id='.$p->cms_user_id).'">'.$this->jomres_encryption->decrypt($p->enc_surname).'</a>';
				
				$r[] = $p->name;
				$r[] = $p->raised_date;
				$r[] = $p->expiration_date;
				$r[] = $p->invoice_id;

				$output['data'][] = $r;
				}
			}

		
		/*
		 * Return the json encoded data to populate the table rows
		 */
		echo json_encode( $output );
		exit;
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
