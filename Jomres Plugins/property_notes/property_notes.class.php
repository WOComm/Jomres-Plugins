<?php
	/**
	 * Jomres CMS Agnostic Plugin
	 * @author Woollyinwales IT <sales@jomres.net>
	 * @version Jomres 9
	 * @package Jomres
	 * @copyright	2005-2018 Woollyinwales IT
	 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
	 **/

// ################################################################
	defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

	class property_notes
	{
		function __construct()
		{
			$this->propertyNotes=array();
		}

		function get_notes_for_property_by_id($property_uid = 0)
		{
			if ( $property_uid == 0 ) {
				throw new Exception('Property UID not passed');
			}

			if (!isset($this->propertyNotes[$property_uid] ) ) {
				$query="SELECT `id`, `property_uid` , `property_note` FROM #__jomres_property_notes WHERE property_uid = '".(int)$property_uid."' LIMIT 1 ";
				$notesList=doSelectSql($query );
				if (!empty($notesList)) {
					foreach ($notesList as $s) {
						$property_note_linebreaks = preg_replace('/\<br(\s*)?\/?\>/i', "", $s->property_note); // When we save notes, to preserve formatting we do nl2br (or equivalent) for simple display formatting. When we pull it back out we'll both remove the br's (for editing) and retain them for display

						$property_note_linebreaks = str_replace( "&#10;" , "<br/>" , $property_note_linebreaks);
						$s->property_note = str_replace( "&#10;" , "<br/>" , $s->property_note);

						$this->propertyNotes[$property_uid] = array ( "id" => $s->id , "property_uid" => $s->property_uid , "property_note_br" => $s->property_note , "property_note_linebreaks" => $property_note_linebreaks );
					}
				}
			}

			if (isset($this->propertyNotes[$property_uid])) {
				return $this->propertyNotes[$property_uid];
			} else {
				return array();
			}

		}

		function save_note_by_property_uid ($note = '' , $property_uid = 0 )
		{
			if ( (int)$property_uid == 0 ) {
				throw new Exception('Property UID not passed');
			}

			$this->get_notes_for_property_by_id($property_uid);

			$note = nl2br($note);

			if (!isset($this->propertyNotes[$property_uid] ) ) { // No note exists
				$query = "INSERT INTO #__jomres_property_notes 
					(
					`property_uid` , 
					`property_note`
					)
					VALUES 
					(
					".$property_uid." ,
					'".$note."'
					)";
				$note_id = doInsertSql( $query , jr_gettext('PROPERTY_NOTES_ADDED', 'PROPERTY_NOTES_ADDED', false, false)  );
			} else {
				$query = "UPDATE #__jomres_property_notes 
					SET 
					`property_note` = '".$note."'
					WHERE
					`property_uid` = ".(int)$property_uid;
				$result = doInsertSql( $query ,  jr_gettext('PROPERTY_NOTES_UPDATED', 'PROPERTY_NOTES_UPDATED', false, false) );
				$note_id = $this->propertyNotes[$property_uid]['id'];
			}

			return $note_id;

		}
	}
