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

jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE', "Výchozí nastavení vlastností");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE', "Název obecné konfigurace (pokud je k dispozici, některé nemusí)");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME', "Název proměnné");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE', "Aktuální hodnota");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING', "Toto je pokročilá funkce, pokud pro ni nemáte konkrétní použití, je lepší ji nepoužívat. Tento plugin vám umožňuje upravit výchozí hodnoty nové vlastnosti. Vytvořit určitě rozumíte tomu, co proměnná dělá před změnou, protože její změna zde může mít dalekosáhlé dopady na váš systém Jomres. Prázdné položky jsou obecně starší nastavení, která se již nepoužívají, ale zůstávají na místě z důvodu zpětné kompatibility nebo jsou nastavení, která nelze upravit v oblasti Konfigurace vlastností. ");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE', "Nová hodnota");