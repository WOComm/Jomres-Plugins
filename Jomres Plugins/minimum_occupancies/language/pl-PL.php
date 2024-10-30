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
jr_define('_OCCUPANCIES_TITLE',"Minimalne obłożenia");

jr_define('_OCCUPANCIES_DESCRIPTION',"Możesz ustawić minimalne poziomy obłożenia dla określonych typów pokoi, jeśli chcesz mieć pewność, że gość wybrał określoną liczbę typów gości w formularzu rezerwacji, zanim pojawi się odpowiednia kombinacja pokoju i taryfy." );
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Tutaj możesz określić minimalny poziom obłożenia dla każdego typu pokoju. Kombinacja pokoju/taryfy nie będzie oferowana, jeśli gość nie wybrał odpowiedniej liczby typów gości. Dla każdego typu pokoju wybierz liczba gości danego typu, która powinna być minimalna w formularzu rezerwacji, zanim dany typ pokoju zostanie zaoferowany. Jeśli nie obchodzi Cię, jaki powinien być poziom obłożenia danego typu pokoju, pozostaw numer gości tego typu pokoju ustawiony na 0 (zero). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Numer typu gościa");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"Nie masz jeszcze utworzonych żadnych typów gości. Przed użyciem tej funkcji utwórz kilka typów gości.");

jr_define('_OCCUPANCIES_EDIT',"Edytuj minimalne obłożenie dla ");