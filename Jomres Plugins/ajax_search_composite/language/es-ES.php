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
jr_define ('_JOMRES_MICROMANAGE_PICKERDROPDOWN_EDITPRICES', "Fijar precios manualmente");
jr_define ('_JOMRES_MICROMANAGE_PICKERDROPDOWN_EDITMINDAYS', "Establecer noches mínimas manualmente");
jr_define ('_JOMRES_MICROMANAGE_PICKER_SETMINDAYS', "Establecer noches mínimas");

jr_define ('_JOMRES_MICROMANAGE_PICKER_TYPE_DOW', "Fijar precio por noche por día de la semana");
jr_define ('_JOMRES_MICROMANAGE_PICKER_TYPE_INTERVAL_RATES', "Establecer precio por noche por rango de fechas");
jr_define ('_JOMRES_MICROMANAGE_PICKER_TYPE_INTERVAL_MINDAYS', "Establecer noches mínimas por rango de fechas");

jr_define ('_JOMRES_MICROMANAGE_PICKER_INSTRUCTIONS_RATES', "Los selectores de fechas y la entrada de tarifas le permiten establecer un precio para un rango de fechas determinado. Elija una fecha de inicio y finalización, ingrese un precio y haga clic en el botón Establecer precio por noche");
jr_define ('_JOMRES_MICROMANAGE_PICKER_INSTRUCTIONS_MINDAYS', "Los selectores de fechas y la entrada de noches mínimas le permiten establecer un valor para las noches mínimas para un rango de fechas determinado. Elija una fecha de inicio y finalización, ingrese un número para las noches mínimas y haga clic en 'Establecer noches mínimas '. ");

jr_define ('_JOMRES_MICROMANAGE_PICKERS_SELECTOR_INFO', "Utilice este menú desplegable para cambiar entre la configuración de precios para fechas individuales y la configuración de noches mínimas para fechas individuales. Puede usar el selector por día de la semana, el selector por rango de fechas o establecer los precios / noches mínimas por editar manualmente las fechas. ");
    jr_define ('_JOMRES_MICROMANAGE_PICKERS_SELECTOR_INFO_SMALL_VIEWPORT', "Use este menú desplegable para cambiar entre la configuración de precios para fechas individuales o para establecer noches mínimas para fechas individuales. Puede usar el selector de rango de fechas o establecer los precios / noches mínimas editando manualmente las fechas") ;
jr_define ('_JOMRES_MICROMANAGE_PICKERS_SELECTOR', "Fijar precios o noches mínimas");

jr_define ('_JOMRES_MICROMANAGE_PICKER_BYDOW', "Establecer noches mínimas por día de la semana");
jr_define ('_JOMRES_MICROMANAGE_PICKER_BYDOW_INFO', "Los campos del día de la semana le permiten establecer un número mínimo de noches para un día de la semana determinado, una vez que haga clic en el botón del día de la semana, todos los días de la semana se establecerán en esa configuración mínima de noches. ");


jr_define ('_JOMRES_MICROMANAGE_MANUALLY', "Fijar precios manualmente / noches mínimas");
jr_define ('_JOMRES_MICROMANAGE_SET_PRICES', "Fijar precios");
jr_define ('_JOMRES_MICROMANAGE_SET_MINDAYS', "Establecer noches mínimas");

jr_define ('_JOMRES_MICROMANAGE_PRICE', "Por noche");
jr_define ('_JOMRES_MICROMANAGE_MINDAYS', "Noches mínimas");
jr_define ('_JOMRES_MICROMANAGE_MAXDAYS', "Noches máximas");

jr_define ('_JOMRES_MICROMANAGE_INTRO', "Aquí puedes crear tus tarifas, las cuales están asociadas a los tipos de habitación que tienes en tu propiedad.");

jr_define ('_JOMRES_MICROMANAGE_BASIC_SETTINGS', "Opciones más utilizadas");

jr_define ('_JOMRES_MICROMANAGE_MODAL_BUTTON', "Instrucciones");

jr_define ('_JOMRES_MICROMANAGE_MULTIPLE_TARIFFS', "Si desea agregar diferentes precios para diferentes números de huéspedes, puede crear más de varias tarifas para cada tipo de habitación y tener diferentes valores mínimos / máximos de huéspedes en esas tarifas");

jr_define ('_JOMRES_MICROMANAGE_INFO', "Asigne un nombre a la tarifa, defina el número máximo de noches y el número mínimo y máximo de huéspedes que se requieren en el formulario de reserva antes de que se ofrezca la tarifa. Utilice el panel selector de fechas para agregar precios y configuraciones mínimas de noches para un rango de fechas, o edite las entradas directamente. Si no desea que la tarifa se ofrezca en absoluto en ciertas fechas, deje el precio establecido en 0 (cero) en esas fechas. Puede tener diferentes noches en diferentes fechas, por lo que si desea reservas más largas durante las semanas de festivales / conferencias, puede configurar las noches mínimas para que sean más altas solo en esos períodos.Si cobra por persona por tarifa (PPPN), puede habilitar esa configuración en Configuración> Propiedad Configuración> pestaña Tarifas y moneda, luego cree los tipos de invitados que necesita en Configuración> Tipos de invitados. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Habilitar / deshabilitar la entrada de estrellas en el formulario. Tenga en cuenta que si ha configurado una opción a través de la pestaña de configuración compuesta de búsqueda Ajax en Configuración del sitio en No, entonces la configuración de 'asc_by_stars' en la lista de argumentos no tendrá efecto.");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Habilitar / deshabilitar la entrada de Estrellas en el formulario. Tenga en cuenta que si ha configurado una opción a través de la pestaña de configuración compuesta de búsqueda Ajax en Configuración del sitio en No, entonces la configuración 'asc_by_price' en la lista de argumentos no tendrá efecto.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Habilitar / deshabilitar la entrada de características de la propiedad en el formulario. Tenga en cuenta que si ha establecido una opción a través de la pestaña de configuración compuesta de búsqueda Ajax en Configuración del sitio en No, entonces la configuración 'asc_by_features' en la lista de argumentos tendrá sin efecto.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Habilitar / deshabilitar la entrada de País en el formulario. Tenga en cuenta que si ha configurado una opción a través de la pestaña de configuración compuesta de búsqueda Ajax en Configuración del sitio en No, entonces la configuración 'asc_by_country' en la lista de argumentos no tendrá efecto.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Habilitar / deshabilitar la entrada de Región en el formulario. Tenga en cuenta que si ha configurado una opción a través de la pestaña de configuración compuesta de búsqueda Ajax en Configuración del sitio en No, entonces la configuración 'asc_by_region' en la lista de argumentos no tendrá efecto.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Habilitar / deshabilitar la entrada Ciudad en el formulario. Tenga en cuenta que si ha configurado una opción a través de la pestaña de configuración compuesta de búsqueda Ajax en Configuración del sitio en No, entonces la configuración 'asc_by_town' en la lista de argumentos no tendrá efecto.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Habilitar / deshabilitar la entrada de tipo de habitación en el formulario. Tenga en cuenta que si ha establecido una opción a través de la pestaña de configuración compuesta de búsqueda Ajax en Configuración del sitio en No, entonces la configuración 'asc_by_roomtype' en la lista de argumentos tendrá sin efecto.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Habilitar / deshabilitar la entrada del tipo de propiedad en el formulario. Tenga en cuenta que si ha establecido una opción a través de la pestaña de configuración compuesta de búsqueda Ajax en Configuración del sitio en No, entonces establezca 'asc_by_property listtype' sin efecto.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Habilitar / deshabilitar la entrada de números de invitado en el formulario. Tenga en cuenta que si ha configurado una opción a través de la pestaña de configuración compuesta de búsqueda Ajax en Configuración del sitio en No, entonces la configuración 'asc_by_guestnumber tendrá' en la lista de argumentos sin efecto.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Habilitar / deshabilitar la entrada de fecha en el formulario. Tenga en cuenta que si ha configurado una opción a través de la pestaña de configuración compuesta de búsqueda Ajax en Configuración del sitio en No, entonces la configuración 'asc_by_date' en la lista de argumentos no tendrá efecto.");