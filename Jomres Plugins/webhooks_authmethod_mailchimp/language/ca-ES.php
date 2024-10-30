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


jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Aquest mètode d\'integració actualitza una llista de Mailchimp quan afegiu un convidat al sistema.<br/>
No cal que configureu l\'entrada d\'URL per a aquest webhook, ho descobrirem en funció de la vostra API.<br/>
Per configurar aquest webhook necessitareu dos elements d\'informació, una clau API i l\'ID de la llista. <br/>
Per trobar la vostra clau API, aneu al vostre compte de Mailchimp i:<br/>
<ol>
  <li>Feu clic al nom del vostre perfil per ampliar el tauler del compte i seleccioneu Compte.</li>
  <li>Feu clic al menú desplegable Extres i seleccioneu Claus API.</li>
  <li>Copieu una clau d\'API existent o feu clic al botó Crea una clau.</li>
  <li>Anomeneu la vostra clau de manera descriptiva per saber quina aplicació la utilitza.</li>
</ol>
A continuació, necessitareu l\'identificador de la llista, que podeu trobar visitant les vostres llistes a Mailchimp. Feu clic a l\'enllaç del menú Llistes i, al final de la fila de la dreta, feu clic al menú desplegable i, a continuació, trieu Configuració. Desplaceu-vos fins al final d\'aquesta pàgina, dirà alguna cosa com "Identificador de la llista per a la llista blahblah". Aquest és l\'identificador de la llista que heu d\'utilitzar.
');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'Clau API');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'ID de llista');