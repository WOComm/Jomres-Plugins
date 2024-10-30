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
jr_define('DISALLOW_SYNDICATION_TITLE',"Nie zezwalaj na dystrybucję");
jr_define('DISALLOW_SYNDICATION_DESCRIPTION','Funkcja syndykacji Jomres.net to nowa funkcjonalność przeznaczona do współdzielenia właściwości między witrynami, chociaż rezerwacje mogą być dokonywane tylko na serwerze Home. ');

jr_define('DISALLOW_SYNDICATION_DESCRIPTION_MORE',"Celem tego jest umożliwienie witrynom budowanie zaufania do wyszukiwarek. Jest to bezpłatna funkcja, dostępna dla wszystkich użytkowników Jomres. Aktywni posiadacze licencji Jomres mogą, jeśli chcą, usunąć swoje witryny z sieci dystrybucyjnej za pośrednictwem tej strony. Nie można dodać hosta lokalnego do sieci, a jeśli z jakiegokolwiek powodu wystąpi problem z połączeniem, nie będzie można dodać witryny do sieci. Sprawdź stronę testową połączenia interfejsu API REST, jeśli mają jakiekolwiek wątpliwości.");

jr_define('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW',"Kliknij ten link, aby usunąć swoją witrynę z sieci.");
jr_define('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW',"Kliknij ten link, aby dodać swoją witrynę do sieci.");

jr_define('DISALLOW_SYNDICATION_DISALLOW',"Usuń tę witrynę z sieci");
jr_define('DISALLOW_SYNDICATION_ALLOW',"Dodaj tę witrynę do sieci");

jr_define('DISALLOW_SYNDICATION_INVALID_KEY',"Przepraszamy, Twój klucz pomocy technicznej jest nieprawidłowy lub nieaktywny, nie możesz zmienić statusu dystrybucji tej instalacji.");