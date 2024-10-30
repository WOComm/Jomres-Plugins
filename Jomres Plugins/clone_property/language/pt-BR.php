<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################


jr_define ('_JRPORTAL_CLONEPROPERTY_TITLE', "Propriedade do clone");
jr_define ('_JRPORTAL_CLONEPROPERTY_CHOOSEPROPERTY', "Selecione a propriedade que deseja clonar:");
jr_define ('_JRPORTAL_CLONEPROPERTY_NEWPROPERTY_NAME', "Novo nome da propriedade:");
jr_define ('_JRPORTAL_CLONEPROPERTY_NOTES', "Esteja ciente de que as propriedades do clone não têm tarifas, você deve usar o plugin Clone Tariffs se desejar copiar tarifas ou criar as tarifas manualmente. Nenhuma configuração de plugin é importada, se disponível. A propriedade não tem referência cruzada com quaisquer gerentes de propriedade. <br/> Clonar propriedade só deve ser usado para duplicar uma propriedade quando a nova propriedade, posteriormente, usar o mesmo tipo de propriedade e tipo de quarto. ");
jr_define ('_JRPORTAL_CLONEPROPERTY_DONE', "Propriedade clonada");