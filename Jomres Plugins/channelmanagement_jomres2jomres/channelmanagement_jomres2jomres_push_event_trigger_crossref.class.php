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
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

/**
*
* @package Jomres\CMF
*
* Returns an array of Jomres webhooks and the Jomres2jomres scripts that will be called when those webhooks have been triggered
* For completion I'll record most webhook events as empty for now.
*
* Where array elements have more than one item, then the index is used to group webhook events together so that the parent can handle the element's webhook (e.g. booking_added can also handle blackbooking_added)
*
*/

class channelmanagement_jomres2jomres_push_event_trigger_crossref
{
    function __construct()
	{
		$this->events = array (
			'blackbooking_added'		=> [  ], // Mirrored
			'blackbooking_deleted'		=> [  ], // Mirrored
			'booking_added'				=> [ 'booking_added' , 'blackbooking_added'], // Mirrored
			'booking_cancelled'			=> [  ], // Mirrored
			'booking_marked_noshow'		=> [  ], // Wont mirror
			'booking_modified'			=> [  ],
			'booking_note_deleted'		=> [  ], // Wont mirror
			'booking_note_saved'		=> [  ], // Wont mirror
			'changeover_day_enabled'	=> [  ], // Wont mirror?
			'changeover_day_disabled'	=> [  ], // Wont mirror?
			'coupon_saved'				=> [ 'coupon_saved' , 'coupon_updated' ], // Mirrored
			'coupon_deleted'			=> [  ], // Mirrored
			'deposit_saved'				=> [  ], // Wont mirror
			'extra_deleted'				=> [  ], // Mirrored
			'extra_saved'				=> [  ], // Mirrored
			'guest_checkedin'			=> [  ], // Wont mirror
			'guest_checkedin_undone'	=> [  ], // Wont mirror
			'guest_checkedout'			=> [  ], // Wont mirror
			'guest_checkedout_undone'	=> [  ], // Wont mirror
			'guest_deleted'				=> [  ], // Wont mirror
			'guest_saved'				=> [  ], // Wont mirror
			'guest_type_deleted'		=> [  ], // Mirrored
			'guest_type_saved'			=> [  ], // Mirrored
			'image_added'				=> [  ], // Mirrored
			'image_deleted'				=> [  ], // Mirrored
			'invoice_created'			=> [  ], // Wont mirror
			'invoice_cancelled'			=> [  ], // Wont mirror
			'invoice_saved'				=> [  ], // Wont mirror
			'property_created'			=> [ 'property_created' ], // Mirrored
			'property_deleted'			=> [ 'property_deleted' ], // Mirrored
			'property_published'		=> [  ], // Mirrored
			'property_settings_updated'	=> [  ], // Mirrored
			'plugin_settings_saved'		=> [  ], // Mirrored
			'property_unpublished'		=> [  ], // Mirrored
			'property_approved'			=> [  ],
			'property_unapproved'		=> [  ],
			'property_updated'			=> [  ], // Mirrored
			'property_completed'		=> [  ],
			'property_incompleted'		=> [  ],
			'review_deleted'			=> [  ], // Mirrored
			'review_published'			=> [  ], // Mirrored
			'review_saved'				=> [  ], // Mirrored
			'review_unpublished'		=> [  ], // Mirrored
			'room_added'				=> [ 'room_added' , 'room_updated' ], // Mirrored
			'room_deleted'				=> [  ], // Mirrored
			'rooms_multiple_added'		=> [  ], // Mirrored
			'rooms_multiple_deleted'	=> [  ], // Mirrored
			'tariff_cloned'				=> [  ],
			'tariffs_updated'			=> [  ] // Mirrored
		);
	}

}




