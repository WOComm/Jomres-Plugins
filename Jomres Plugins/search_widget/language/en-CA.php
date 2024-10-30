<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################


jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET', "Supplies a variety of search layouts that can be included in shortcodes that for example look like [jomres task=\"search_widget\" params=\"&search_widget=horizontal_dates_sleeps\" ] IGNORE THE EXAMPLE COLUMN HERE as you should only use the search_widget=XXX parameter once in the params section. " );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_SLEEPS', "Horizontal form with checkin/out dates and the Sleeps dropdown.<br/>  params=\"&search_widget='horizontal_dates_sleeps'\" <br/> Supported BS versions : BS3 & BS5.  " );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_COUNTRIES', "Horizontal form with checkin/out dates and the countries dropdown.<br/>  params=\"&search_widget='horizontal_dates_countries'\" <br/> Supported BS versions : BS3 & BS5. " );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_FEATURES', "Horizontal form with checkin/out dates and the property features dropdown.<br/>  params=\"&search_widget='horizontal_dates_features'\" <br/> Supported BS versions : BS3 & BS5. "  );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_PROPERTY_TYPES', "Horizontal form with checkin/out dates and the property types dropdown.<br/>  params=\"&search_widget='horizontal_dates_property_types'\" <br/> Supported BS versions : BS3 & BS5. "  );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_REGIONS', "Horizontal form with checkin/out dates and the regions dropdown.<br/>  params=\"&search_widget='horizontal_dates_regions'\" <br/> Supported BS versions : BS3 & BS5. "  );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_ROOM_TYPES', "Horizontal form with checkin/out dates and the room types dropdown.<br/>  params=\"&search_widget='horizontal_dates_room_types'\" <br/> Supported BS versions : BS3 & BS5. "  );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_STARS', "Horizontal form with checkin/out dates and the stars dropdown.<br/>  params=\"&search_widget='horizontal_dates_stars'\" <br/> Supported BS versions : BS3 & BS5. "  );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_TOWNS', "Horizontal form with checkin/out dates and the towns dropdown.<br/>  params=\"&search_widget='horizontal_dates_towns'\" <br/> Supported BS versions : BS3 & BS5. " );

jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_CATEGORIES', "Horizontal form with checkin/out dates and the property categories dropdown.<br/>  params=\"&search_widget='horizontal_dates_categories'\" <br/> Supported BS versions : BS3 & BS5. " );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_PROPERTY_NAME', "Horizontal form with input field to allow searching by property name.<br/>  params=\"&search_widget='horizontal_property_name'\" <br/> Supported BS versions : BS3 & BS5. " );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DESCRIPTION', "Horizontal form with input field to allow searching by all property fields (description, location, read more etc)<br/>  params=\"&search_widget='horizontal_description'\" <br/> Supported BS versions : BS3 & BS5. " );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_LOCATION_DATES_CATEGORIES', "Horizontal form with searchable location dropdown, checkin/out dates and Sleeps dropdown.<br/>  params=\"&search_widget='horizontal_description'\" <br/> Supported BS versions : BS3 & BS5. " );

jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_SLEEPS', "Vertically laid out form with checkin/out dates and the Sleeps dropdown.<br/>  params=\"&search_widget='vertical_dates_sleeps'\" <br/> Supported BS versions : BS3 & BS5." );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_COUNTRIES', "Vertically laid out form with checkin/out dates and the countries dropdown.<br/>  params=\"&search_widget='vertical_dates_countries'\" <br/> Supported BS versions : BS3 & BS5. " );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_FEATURES', "Vertically laid out form with checkin/out dates and the property features dropdown.<br/>  params=\"&search_widget='vertical_dates_features'\" <br/> Supported BS versions : BS3 & BS5. "  );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_PROPERTY_TYPES', "Vertically laid out form with checkin/out dates and the property types dropdown.<br/>  params=\"&search_widget='vertical_dates_property_types'\" <br/> Supported BS versions : BS3 & BS5. "  );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_REGIONS', "Vertically laid out form with checkin/out dates and the regions dropdown.<br/>  params=\"&search_widget='vertical_dates_regions'\" <br/> Supported BS versions : BS3 & BS5. "  );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_ROOM_TYPES', "Vertically laid out form with checkin/out dates and the room types dropdown.<br/>  params=\"&search_widget='vertical_dates_room_types'\" <br/> Supported BS versions : BS3 & BS5. "  );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_STARS', "Vertically laid out form with checkin/out dates and the stars dropdown.<br/>  params=\"&search_widget='vertical_dates_stars'\" <br/> Supported BS versions : BS3 & BS5. "  );
jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_TOWNS', "Vertically laid out form with checkin/out dates and the towns dropdown.<br/>  params=\"&search_widget='vertical_dates_towns'\" <br/> Supported BS versions : BS3 & BS5. " );
	jr_define( '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_AUTOCOMPLETE', "Horizontal form with Autocomplete, checkin/out dates and the Sleeps dropdown.<br/>  params=\"&search_widget='horizontal_autocomplete_adults_children_button'\" <br/> Supported BS versions : BS3 & BS5.  " );