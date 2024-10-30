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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Managementul canalului");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Clientul poate efectua activități de gestionare a canalelor. Rețineți, acest lucru oferă clientului o putere considerabilă în sistem pentru a vă modifica conturile și proprietățile.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Curățare");

jr_define ('_CMF_CANCELLED_BOOKING', "Managerul canalului a anulat rezervarea");

jr_define ('_CMF_CLEANING_STRING', "Curățare"); // Nu modificați acest lucru dacă ați importat deja proprietăți. Proprietățile cu taxe de curățenie au un Extra cu acest nume
jr_define ('_CMF_SECURITY_STRING', "Depozit de garanție"); // Nu modificați acest lucru dacă ați importat deja proprietăți. Proprietățile cu depozite de garanție au un Extra cu acest nume


jr_define ("_CMF_API_PRIVACY", "Confidențialitate API");
jr_define ('_CMF_API_PRIVACY_ON', "Confidențialitate activată");
jr_define ('_CMF_API_PRIVACY_OFF', "Confidențialitate dezactivată");

jr_define ("_CMF_API_PRIVACY_DESC", "Informațiile unei proprietăți pot fi văzute numai de canalul care a creat-o. De exemplu, dacă ați dat perechi de chei API diferite atât Canalului A, cât și Canalului B, informațiile unei proprietăți create de Canalul A nu pot fi să fie văzut de Canalul B ... dacă nu dezactivați confidențialitatea API pentru a permite tuturor canalelor să vadă toate informațiile despre proprietate prin API. Setați confidențialitatea API la Dezactivat dacă partajați această proprietate cu un alt site care dorește să enumere proprietatea. Dacă nu partajați această proprietate cu alte site-uri, lăsați confidențialitatea API setată la Activat. ");