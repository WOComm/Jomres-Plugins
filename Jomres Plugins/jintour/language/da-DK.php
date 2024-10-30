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


jr_define('_JINTOUR_TITLE',"Tour/Aktivitetsstyring");

jr_define('_JINTOUR_PROFILES_TITLE',"Tur-/aktivitetsprofiler");
jr_define('_JINTOUR_PROFILES_NEW',"Ny tur/aktivitetsprofil");
jr_define('_JINTOUR_PROFILES_DELETE',"Slet tur/aktivitetsprofil");

jr_define('_JINTOUR_PROFILE_TITLE',"Profiltitel");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"Beskrivelse");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"Indtast en beskrivelse af din tur/aktivitet, inklusive dens rejseplan.");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"Ugedage");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"Voksenpris");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"Børnepris");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"For at udelukke en mulighed fra at blive vist i reservationsformularen, lad prisen være 0 (nul)");
jr_define ('_JINTOUR_PROFILE_SPACES_ADULTS', "Voksenrum");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Underrum");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"Antallet af ledige pladser på turen/aktiviteten");
jr_define('_JINTOUR_PROFILE_START_DATE',"Sæsonstart");
jr_define('_JINTOUR_PROFILE_END_DATE',"Sæsonen slutter");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"Når du har oprettet en tur-/aktivitetsprofil, skal du generere ture/aktiviteter baseret på den pågældende profils indstillinger. Opret turen/aktiviteten, og klik derefter på det grønne pilikon ud for profilen for at oprette selve turene/aktiviteterne. Når turene/aktiviteterne er oprettet, vil du være i stand til at slette individuelle ture/aktiviteter, hvis du ønsker det.");
jr_define ('_JINTOUR_PROFILE_GENERATE', "Generer ture/aktiviteter");

jr_define('_JINTOUR_TOUR_TITLE',"Aktivitetstitel");
jr_define('_JINTOUR_TOUR_DATE',"Dato");
jr_define('_JINTOUR_TOUR_ADULTS',"Voksne");
jr_define('_JINTOUR_TOUR_KIDS',"Børn");
jr_define('_JINTOUR_TOUR_RETUR',"Rejseplan");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"Genereret nye ture");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Turbestilling annulleret");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"Nye ture genereret");
jr_define ('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE', "Ledige pladser i øjeblikket");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"Ny reservation for tur/ressource-id ");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"En ny reservation for en administratortur/ressource er blevet foretaget. Se venligst følgende link for at se denne turs administratorområdeside ");

jr_define ('_JINTOUR_TITLE_CONFIG', "Jomres Integrated Tours Configuration");
jr_define('_JINTOUR_TITLE_WHOLESITE',"Er hele installationen en Jintour-installation?");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"Hvis du indstiller dette til Ja, så vil alle ejendomme være turejendomme. Hvis du sætter det til Nej, vil du, når der oprettes nye ejendomme, kunne have både Tour og Hotel/Lejligheds type egenskaber. ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"Tours");
jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC', "Vælg mulighederne for ture, hvis du tilbyder bookinger af varer, der er tilgængelige på bestemte datoer (f.eks. ture, billetter til en koncert.)");
jr_define ('_JINTOUR_SHOWDEPARTURE', "Vis afgangsindgangsfeltet?");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Sæt dette til Ja, hvis du vil vise både en ankomst- og afgangsdato. Dette ville være nyttigt, hvis du tilbyder busture, flybilletter osv., hvor du skal kende både indgående og udgående datoer, Visning af afrejsedatoen giver dig mulighed for at tilbyde ressourcer over flere datoer, hvorimod med indstillingen sat til Nej, kan kun reservationer for én dato accepteres.");

jr_define ('_JINTOUR_PROFILES_TITLE_LIST', "Rundvisningsliste");