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

jr_define ('_OCCUPANCIES_TITLE', "Minimálna obsadenosť");

jr_define ('_OCCUPANCIES_DESCRIPTION', "Môžete nastaviť minimálne úrovne obsadenosti pre konkrétne typy izieb, ak chcete zaistiť, aby si hosť v rezervačnom formulári vybral určitý počet typov hostí predtým, ako sa zobrazí príslušná kombinácia izieb a taríf." );
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Tu môžete vytvoriť minimálnu úroveň obsadenosti pre každý typ izby. Kombinácia izby/tarifu nebude ponúknutá, ak si hosť nezvolil príslušný počet typov hostí. Pre každý typ izby vyberte počet hostí daného typu, ktorý by mal byť minimálny v rezervačnom formulári pred ponúknutím typu izby. Ak vám nezáleží na tom, aká by mala byť úroveň obsadenosti pre daný typ izby, ponechajte číslo hosťa daného typu izby nastavené na 0 (nula). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Číslo typu hosťa");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"Ešte nemáte vytvorené žiadne typy hostí. Pred použitím tejto funkcie vytvorte nejaké typy hostí.");

jr_define('_OCCUPANCIES_EDIT',"Upraviť minimálnu obsadenosť pre ");