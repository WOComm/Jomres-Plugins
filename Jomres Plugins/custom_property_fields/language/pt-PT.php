<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Translated to pt-PT by Mario Oliveira, Camara de Lobos, Madeira Island, Portugal, 17Set2010 - www.marioliveira.net - Updated 21Jun2011 for ver 5.1
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('Direct Access to this file is not allowed.');
//#################################################################


jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Campos de propriedades personalizadas");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Editar campo de propriedade personalizada");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Use este recurso para criar campos de informações personalizadas para propriedades. Essas informações são adicionadas por um gerenciador de propriedades e exibidas em uma nova guia na página de detalhes da propriedade.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Outras informações de propriedade");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Esses campos de propriedade customizada podem ser exibidos em detalhes de propriedade em uma guia separada ou na lista de propriedades. Você precisará editar manualmente /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (para o snippet da lista de propriedades) para atingir o layout que você precisa. Com os campos inseridos acima, um layout básico seria semelhante ao seguinte, que você pode usar como exemplo a partir do qual pode construir seu próprio layout. ");