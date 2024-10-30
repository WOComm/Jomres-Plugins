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
jr_define('_JINTOUR_TITLE',"Tur-/aktivitetsadministrasjon");

jr_define('_JINTOUR_PROFILES_TITLE',"Tur-/aktivitetsprofiler");
jr_define ('_JINTOUR_PROFILES_NEW', "Ny tur-/aktivitetsprofil");
jr_define('_JINTOUR_PROFILES_DELETE',"Slett tur-/aktivitetsprofil");

jr_define('_JINTOUR_PROFILE_TITLE',"Profiltittel");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"Beskrivelse");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"Skriv inn en beskrivelse av turen/aktiviteten din, inkludert reiseruten.");
jr_define ('_JINTOUR_PROFILE_DAYS_OF_WEEK', "Ukedager");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"Voksenpris");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"Barnepris");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"For å utelukke et alternativ fra å vises i bestillingsskjemaet, la prisen være 0 (null)");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"Voksenrom");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Barnerom");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"Antall ledige plasser på turen/aktiviteten");
jr_define ('_JINTOUR_PROFILE_START_DATE', "Sesongstart");
jr_define('_JINTOUR_PROFILE_END_DATE',"Sesongen slutter");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"Når du har opprettet en tur-/aktivitetsprofil, må du generere turer/aktiviteter basert på profilens innstillinger. Opprett turen/aktiviteten, og klikk deretter på det grønne pilikonet ved siden av profilen for å opprette selve turene/aktivitetene. Når turene/aktivitetene er opprettet vil du kunne slette individuelle turer/aktiviteter hvis du ønsker.");
jr_define('_JINTOUR_PROFILE_GENERATE',"Generer turer/aktiviteter");

jr_define('_JINTOUR_TOUR_TITLE',"Aktivitetstittel");
jr_define ('_JINTOUR_TOUR_DATE', "Date");
jr_define ('_JINTOUR_TOUR_ADULTS', "Voksne");
jr_define('_JINTOUR_TOUR_KIDS',"Barn");
jr_define('_JINTOUR_TOUR_ITINERY',"Reiseplan");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"Genererte nye turer");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Turbestilling kansellert");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"Nye turer generert");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"Ledige plasser for øyeblikket");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"Ny bestilling for tur/ressurs-ID ");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"En ny bestilling for en administratortur/ressurs er gjort. Vennligst se følgende lenke for å se den turens administratorområdeside ");

jr_define('_JINTOUR_TITLE_CONFIG',"Jomres Integrated Tours Configuration");
jr_define('_JINTOUR_TITLE_WHOLESITE',"Er hele installasjonen en Jintour-installasjon?");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"Hvis du setter dette til Ja, så vil alle eiendommer være turegenskaper. Hvis du setter det til Nei, så når nye eiendommer er opprettet vil du kunne ha både tur- og hotell-/leilighetsegenskaper. ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"Tours");
jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC',"Velg turalternativet hvis du tilbyr bestilling av varer som er tilgjengelige på bestemte datoer (f.eks. turer, billetter til en konsert.)");
jr_define('_JINTOUR_SHOWDEPARTURE',"Vis inndatafeltet for avgang?");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Sett dette til Ja hvis du vil vise både en ankomst- og avreisedato. Dette vil være nyttig hvis du tilbyr bussturer, flybilletter osv. der du trenger å vite både innkommende og utgående datoer, Ved å vise avreisedatoen kan du tilby ressurser over flere datoer, mens med innstillingen satt til Nei, kan bare bestillinger for én dato godtas. ");

jr_define ('_JINTOUR_PROFILES_TITLE_LIST', "Turliste");