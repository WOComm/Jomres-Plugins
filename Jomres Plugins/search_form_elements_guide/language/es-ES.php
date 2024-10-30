<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 * @version Jomres 10.7.0
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/
//#################################################################
	defined('_JOMRES_INITCHECK') or die('');
	//#################################################################


	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Guía de elementos de formulario de búsqueda");

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Instale el complemento Elementos de formulario de búsqueda para agregar formularios de búsqueda a su sitio usando los códigos cortos que se muestran aquí. Esta página le muestra qué códigos cortos están disponibles para que pueda crear exactamente los formularios de búsqueda que necesita para su sitio . Puede copiar estos códigos y pegarlos directamente en su página/artículo/módulo y comenzar a trabajar en el diseño. En la parte inferior de la página verá varios formularios de búsqueda de ejemplo. Haga clic en el botón para abrir un modal y use el botón Copiar para copiar el marcado en su portapapeles. Luego puede usar ese marcado en sus artículos/módulos para crear los formularios de búsqueda." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Estos son todos los códigos abreviados disponibles para usted al crear formularios de búsqueda." );

	jr_define('_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Ejemplos");
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Puede usar cualquiera de los códigos abreviados aquí en esta página para modificar los ejemplos provistos, o usar los ejemplos tal cual. Copie y pegue los códigos abreviados y/o ejemplos en una página, artículo o módulo para ver el Formulario de búsqueda." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Siempre debe incluir los shortcodes form_start, form_button y form_end en su formulario de búsqueda." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Debido a que estos son códigos cortos que usan plantillas de Jomres, puede usar la función de anulación de plantilla para códigos cortos para modificar la salida. Por ejemplo, puede copiar /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete .html a su directorio theme/template /html/com_jomres y esto se convertirá en la anulación Además, si, por ejemplo, desea que varios formularios y uno sea diferente a los demás, puede cambiar el nombre del archivo de plantilla (por ejemplo, search_form_autocomplete.html) en /html/com_jomres a search_form_autocomplete_new.html y luego use el siguiente código abreviado: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Si desea utilizar los códigos abreviados en un archivo de plantilla de Jomres, por ejemplo, el control deslizante de héroe, deberá reemplazar {jomres con {jomres_script y Jomres analizará los códigos abreviados por sí mismo.");