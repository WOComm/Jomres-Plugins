<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Delete Property
	** Description | Delete a user's property
	** Plugin | api_feature_properties
	** Scope | properties_set
	** URL | properties
 	** Method | DELETE
	** URL Parameters | properties/:ID/
	** Data Parameters | None
	** Success Response | {"data":{"id":"86"}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access" or "User must have at least one property in the system. Cannot delete last property."
	** Sample call |jomres/api/properties/85
	** Notes | If the user has just one property that they have access rights to, they will not be able to delete that property
*/

Flight::route('DELETE /properties/@id', function($property_uid) 
	{
	validate_scope::validate('properties_set');
	
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	
	validate_property_access::validate($property_uid);
	
	$call_self = new call_self();
		$elements = array(
			"method"=>"GET",
			"request"=>"properties/all",
			"data"=>array()
			);

	$users_properties = json_decode($call_self->call($elements));

	if ( count ($users_properties->data->ids) > 1 )
		{
		$query="SELECT property_uid FROM ".Flight::get("dbprefix")."jomres_jintour_properties WHERE property_uid = :property_uid ";
		$stmt = $conn->prepare( $query );
		$stmt->execute(['property_uid' => $property_uid ]);
		$property = $stmt->fetch();
		
		$is_jintour_property = false;
		if ( (int) $property['property_uid'] > 1)
			$is_jintour_property = true;

		$conn->beginTransaction();
		try 
			{
			$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_customertypes WHERE property_uid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);
			
			$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_extraservices WHERE property_uid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);
			
			$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_contracts WHERE property_uid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);
			
			$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_rates WHERE property_uid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);;
			
			$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_room_bookings WHERE property_uid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);
			
			$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_room_classes WHERE property_uid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);
			
			$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_rooms WHERE propertys_uid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);
			
			$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_room_features WHERE property_uid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);
			
			$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_pluginsettings WHERE prid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);
			
			$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_settings WHERE property_uid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);
			
			$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_custom_text WHERE property_uid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);

			$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_pcounter WHERE p_uid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);
			
			$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_managers_propertys_xref WHERE property_uid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);
			
			if ( $is_jintour_property )
				{
				$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_jintour_profiles WHERE property_uid = :property_uid ";
				$stmt = $conn->prepare( $query );
				$stmt->execute(['property_uid' => $property_uid ]);
			
				$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_jintour_properties WHERE property_uid = :property_uid ";
				$stmt = $conn->prepare( $query );
				$stmt->execute(['property_uid' => $property_uid ]);
			
				$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_jintour_tours WHERE property_uid = :property_uid ";
				$stmt = $conn->prepare( $query );
				$stmt->execute(['property_uid' => $property_uid ]);
			
				$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_jintour_tour_bookings WHERE property_id = :property_uid ";
				$stmt = $conn->prepare( $query );
				$stmt->execute(['property_uid' => $property_uid ]);
				}
			
			$query="DELETE FROM  ".Flight::get("dbprefix")."jomcomp_mufavourites WHERE property_uid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);
			
			$query="DELETE FROM  ".Flight::get("dbprefix")."jomres_propertys WHERE propertys_uid = :property_uid ";
			$stmt = $conn->prepare( $query );
			$stmt->execute(['property_uid' => $property_uid ]);
			
			//We've got this far without an exception, so commit the changes.
			$conn->commit();

			Flight::json( $response_name = "id" , $property_uid);
			}
		catch(Exception $e)
			{
			//Rollback the transaction.
			$conn->rollBack();
			
			//An exception has occured, which means that one of our database queries
			//failed.
			if (!PRODUCTION)
				Flight::json($e->getMessage());
			else
				Flight::halt(500, "Exception occured when deleting, rolling back changes.");
			}
		}
	else
		{
		Flight::halt(403, "User must have at least one property in the system. Cannot delete last property.");
		}
	}); 
