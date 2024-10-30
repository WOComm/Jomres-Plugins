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


jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Ta metoda integracji aktualizuje listę Mailchimp po dodaniu gościa do systemu.<br/>
Nie musisz ustawiać adresu URL dla tego webhooka, ustalimy to na podstawie Twojego interfejsu API.<br/>
Aby skonfigurować ten webhook, potrzebujesz dwóch informacji, klucza API i identyfikatora listy. <br/>
Aby znaleźć klucz API, przejdź do swojego konta Mailchimp i:<br/>
<ol>
  <li>Kliknij nazwę swojego profilu, aby rozwinąć Panel Konta i wybierz Konto.</li>
  <li>Kliknij menu rozwijane Dodatki i wybierz Klucze API.</li>
  <li>Skopiuj istniejący klucz API lub kliknij przycisk Utwórz klucz.</li>
  <li>Nazwij swój klucz opisowo, aby wiedzieć, jaka aplikacja używa tego klucza.</li>
</ol>
Następnie będziesz potrzebować identyfikatora listy, który możesz znaleźć, odwiedzając swoje listy w Mailchimp. Kliknij łącze menu Listy, a na końcu wiersza po prawej stronie kliknij menu rozwijane, a następnie wybierz Ustawienia. Przewiń do dołu tej strony, pojawi się coś w stylu „Identyfikator listy dla listy blahblah”. To jest identyfikator listy, której musisz użyć.
    ' );

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'Klucz API');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'Identyfikator listy' );