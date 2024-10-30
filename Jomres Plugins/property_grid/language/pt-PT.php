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
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Grade de propriedades. Exibe uma linha de propriedades, ideal para uma landing page." );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Use property_uids ou property_cols. property_uids aceita uma lista separada por vírgulas de uids de propriedade que você deseja mostrar. Um máximo de 6 propriedades podem ser mostradas" );
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "Alternativamente, escolha um número de colunas para mostrar entre 1 e 6. Propriedades aleatórias serão selecionadas do banco de dados a serem mostradas." );