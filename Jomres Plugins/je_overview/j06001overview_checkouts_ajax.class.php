<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 7
 * @package Jomres
 * @copyright    2005-2013 Vince Wooll
 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable.
 **/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06001overview_checkouts_ajax
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false; return;
			}

		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		$defaultProperty=getDefaultProperty();
		$lang=get_showtime('lang');
		$today=date("Y/m/d");

		$rows = array ();
		
		//set the table coulmns, in the exact orcer in which they`re displayed in the table
		$aColumns = array( 'a.contract_uid','b.enc_firstname','b.enc_surname','a.arrival','a.departure');
		
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
		$clause = "WHERE a.property_uid = '".(int)$defaultProperty."' AND a.tag IS NOT NULL AND a.cancelled = '0' ";
		
		//date interval filter
		$clause .= "AND DATE_FORMAT(a.departure, '%Y/%m/%d') = DATE_FORMAT('" . $today . "', '%Y/%m/%d') ";
		
		/*
		 * Build and execute the query
		 */
		$query = "SET SQL_BIG_SELECTS=1";
		doInsertSql($query);
		
		$query = "SELECT SQL_CALC_FOUND_ROWS 
						a.contract_uid, 
						a.arrival, 
						a.departure,
						a.deposit_paid,
						a.tag,
						a.booked_in,
						a.bookedout,
						a.cancelled,
						a.invoice_uid,
						b.enc_firstname, 
						b.enc_surname
					FROM #__jomres_contracts a 
						LEFT JOIN #__jomres_guests b ON a.guest_uid = b.guests_uid " 
					. $clause 
					. ' ' . $sWhere 
					. ' ' . $sOrder 
					. ' ' . $sLimit;
		$jomresContractsList = doSelectSql( $query );

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

		foreach ( $jomresContractsList as $p )
			{
			$r         = array ();
			
			if (!using_bootstrap())
				{
				if ( $p->booked_in == 0 )
					{
					$jrtbar = jomres_singleton_abstract::getInstance( 'jomres_toolbar' );
					$jrtb = $jrtbar->startTable();
					$jrtb .= $jrtbar->toolbarItem( 'bookGuestIn', jomresURL( JOMRES_SITEPAGE_URL . '&task=checkin' . '&contract_uid=' . $p->contract_uid ), jr_gettext( '_JOMRES_FRONT_MR_BOOKIN_TITLE', '_JOMRES_FRONT_MR_BOOKIN_TITLE', false ) );
					$r[] = $jrtb .= $jrtbar->endTable();
					}
				else
					$r[] = '';
				}
			else
				{
				$toolbar = jomres_singleton_abstract::getInstance( 'jomresItemToolbar' );
				$toolbar->newToolbar();
				$toolbar->addSecondaryItem( 'fa fa-pencil-square-o', '', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=edit_booking&contract_uid=' . $p->contract_uid ), jr_gettext( '_JOMRES_COM_CONFIRMATION_RESERVATION_DETAILS', '_JOMRES_COM_CONFIRMATION_RESERVATION_DETAILS', false ) );
				if ( $p->booked_in == 0 )
					$toolbar->addItem( 'fa fa-sign-in', 'btn btn-default ', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=checkin&contract_uid=' . $p->contract_uid), jr_gettext( '_JOMRES_ACTION_CHECKIN', '_JOMRES_ACTION_CHECKIN', false ) );
				elseif( $p->bookedout == 0 )
					$toolbar->addItem( 'fa fa-sign-out', 'btn btn-success', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=checkout&contract_uid=' . $p->contract_uid ), jr_gettext( '_JOMRES_ACTION_CHECKOUT', '_JOMRES_ACTION_CHECKOUT', false ) );
				elseif( $p->bookedout == 1 )
					$toolbar->addItem( 'fa fa-check', 'btn  btn-default disabled', '', 'javascript:void();', jr_gettext( '_JOMRES_STATUS_CHECKEDOUT', '_JOMRES_STATUS_CHECKEDOUT', false ) );
				if( $p->bookedout == 0 )
					{
					$toolbar->addSecondaryItem( 'fa fa-pencil-square-o', '', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=amendBooking&contractUid=' . $p->contract_uid ), jr_gettext( '_JOMRES_CONFIRMATION_AMEND', '_JOMRES_CONFIRMATION_AMEND', false ) );
					$toolbar->addSecondaryItem( 'fa fa-usd', '', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=add_service_to_bill&contract_uid=' . $p->contract_uid ), jr_gettext( '_JOMRES_COM_ADDSERVICE_TITLE', '_JOMRES_COM_ADDSERVICE_TITLE', false ) );
					}
				if ( $p->deposit_paid == 0 && $p->bookedout == 0 && $p->cancelled == 0)
					$toolbar->addSecondaryItem( 'fa fa-usd', '', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=edit_deposit&contractUid=' . $p->contract_uid ), jr_gettext( '_JOMRES_COM_MR_EB_PAYM_DEPOSIT_PAID_UPDATE', '_JOMRES_COM_MR_EB_PAYM_DEPOSIT_PAID_UPDATE', false ) );
				$toolbar->addSecondaryItem( 'fa fa-file-text', '', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=view_invoice&id=' . $p->invoice_uid ), jr_gettext( '_JOMRES_MANAGER_SHOWINVOICE', '_JOMRES_MANAGER_SHOWINVOICE', false ) );
				$toolbar->addSecondaryItem( 'fa fa-pencil-square-o', '', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=addnote&contract_uid=' . $p->contract_uid ), jr_gettext( '_JOMCOMP_BOOKINGNOTES_ADD', '_JOMCOMP_BOOKINGNOTES_ADD', false ) );
				$r[]=$toolbar->getToolbar();
				}
			
			$r[] = jomres_decode( $this->jomres_encryption->decrypt($p->enc_firstname) );
			$r[] = jomres_decode( $this->jomres_encryption->decrypt($p->enc_surname) );
			$r[] = outputDate( $p->arrival );
			$r[] = outputDate( $p->departure );

			$output['data'][] = $r;
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
