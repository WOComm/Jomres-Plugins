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


class jomres_custom_property_field_handler
	{
	/**
	#
	* Constructor.
	#
	*/
	function __construct($specific_path=false)
		{
		$this->custom_fields=array();
		$this->custom_fields_by_ptype_id = array();
		$this->custom_fields_data=array();
		$this->getAllCustomFields();
		}
	
	function getAllCustomFields( $ptype_id = 0 )
		{
		$this->custom_fields_by_ptype_id[ $ptype_id ] = get_showtime( 'custom_fields_by_ptype_id'.$ptype_id );
		$this->custom_fields=get_showtime( 'all_custom_fields' );

		if ( empty( $this->custom_fields ) )
			{
			$query  = "SELECT `id`,`fieldname`,`default_value`,`description`,`required`,`order`,`ptype_xref` FROM #__jomres_custom_property_fields_fields ORDER BY `order`";
			$fields = doSelectSql( $query );
			if ( !empty( $fields ) )
				{
				foreach ( $fields as $t )
					{
					$ptype_xref=unserialize($t->ptype_xref);
					if (!empty($ptype_xref))
						{
						foreach($ptype_xref as $ptype)
							{
							$this->custom_fields_by_ptype_id[ $ptype ][ $t->id ] = array ( 
								'uid' => $t->id, 
								'fieldname' => $t->fieldname, 
								'default_value' => $t->default_value, 
								'description' => jr_gettext("CUSTOM_PROPERTY_FIELD_TITLE_".$t->fieldname, $t->description, false), 
								'required' => $t->required, 
								'ptype_xref' => $t->ptype_xref 
								);
							set_showtime( 'custom_fields_by_ptype_id'.$ptype, $this->custom_fields_by_ptype_id[ $ptype ] );
							}
						$this->custom_fields[$t->id] = array(
							'uid'=>$t->id,
							'fieldname'=>$t->fieldname,
							'default_value'=>$t->default_value,
							'description'=>jr_gettext("CUSTOM_PROPERTY_FIELD_TITLE_".$t->fieldname, $t->description, false),
							'required'=>$t->required,
							'order'=>$t->order,
							'ptype_xref'=>$t->ptype_xref
							);
						}
					else
						{
						$this->custom_fields[$t->id] = array(
							'uid'=>$t->id,
							'fieldname'=>$t->fieldname,
							'default_value'=>$t->default_value,
							'description'=>jr_gettext("CUSTOM_PROPERTY_FIELD_TITLE_".$t->fieldname, $t->description, false),
							'required'=>$t->required,
							'order'=>$t->order,
							'ptype_xref'=>$t->ptype_xref
							);
						}
					}
				set_showtime( 'all_custom_fields', $this->custom_fields );
				}
			}
		
		if ($ptype_id > 0)
			{
			if (get_showtime( 'custom_fields_by_ptype_id'.$ptype_id ) )
				return $this->custom_fields_by_ptype_id[ $ptype_id ];
			else
				return array();
			}
		else
			return $this->custom_fields;
		}
		
	function get_custom_field_data_for_property_uid($property_uids)
		{
		$property_uids_to_get_data_for = array();
		
		if (is_array($property_uids))
			{
			foreach ($property_uids as $property_uid)
				{
				if (isset($this->custom_fields_data[$property_uid]))
					{
					return $this->custom_fields_data[$property_uid];
					}
				else
					{
					$property_uids_to_get_data_for[] = $property_uid;
					}
				}
			}
		else
			{
			$property_uid = (int)$property_uids;
			
			if ($property_uid > 0)
				{
				if (isset($this->custom_fields_data[$property_uid]))
					{
					return $this->custom_fields_data[$property_uid];
					}
				else
					{
					$property_uids_to_get_data_for[] = $property_uid;
					}
				}
			}

		if ( !empty($property_uids_to_get_data_for) && !empty($this->custom_fields) )
			{
			$original_property_uid = get_showtime('property_uid');
			
			$all_field_names = array();
			foreach ($this->custom_fields as $f)
				{
				$all_field_names[] = $f['fieldname'];
				}
	
			$query = "SELECT `id`, `fieldname`, `data`, `property_uid` FROM #__jomres_custom_property_fields_data WHERE `property_uid` IN (".jomres_implode($property_uids_to_get_data_for).") ";
			$result = doSelectSql($query);
			
			if (!empty($result))
				{
				foreach ($result as $r)
					{
					if (in_array($r->fieldname,$all_field_names) )
						{
						if ($r->data!='') 
							{
							set_showtime('property_uid', $r->property_uid);

							$this->custom_fields_data[$r->property_uid][$r->fieldname] = jr_gettext("CUSTOM_PROPERTY_FIELD_DATA_".$r->fieldname."_".$r->property_uid,$r->data,false);
							}
						}
					}
				}
			
			set_showtime('property_uid', $original_property_uid);
			}
		
		return $this->custom_fields_data;
		}
	}
