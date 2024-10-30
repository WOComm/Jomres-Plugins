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

jr_define ('PAYPAL_API_KEY_TITLE', "Paypal API -nyckel");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Konfigurera ditt Paypal -klient -ID och hemlighet för både dina live- och Sandbox -konton. När du har konfigurerat det kommer du att kunna ta både bokning och faktura via Paypal.");

jr_define ('PAYPAL_API_CLIENTID', "Klient -ID");
jr_define ('PAYPAL_API_SECRET', "Secret");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "Sandbox Client ID");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Sandbox Secret");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Hur hittar du ditt klient -ID och hemlighet?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Gå till https://developer.paypal.com/ och logga in.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Gå till Mina appar och referenser i sidomenyn.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "klicka på Skapa app för att skapa en ny app");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Ge din app ett namn och klicka sedan på Skapa app.");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "På den här sidan kan du se ditt klient -ID och hemlighet. Kopiera och klistra in dessa nycklar i respektive fält ovan.");
