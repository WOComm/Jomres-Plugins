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


jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp');
jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Este método de integración actualiza una lista de Mailchimp cuando agregas un invitado al sistema. <br/>
No es necesario que establezca la entrada de URL para este webhook, lo averiguaremos en función de su API. <br/>
Para configurar este webhook, necesitará dos elementos de información, una clave de API y el ID de lista. <br/>
Para encontrar su clave API, vaya a su cuenta de Mailchimp y: <br/>
<ol>
  <li> Haga clic en el nombre de su perfil para expandir el Panel de la cuenta y seleccione Cuenta. </li>
  <li> Haga clic en el menú desplegable Extras y elija Claves API. </li>
  <li> Copie una clave API existente o haga clic en el botón Crear una clave. </li>
  <li> Asigne un nombre descriptivo a su clave, de modo que sepa qué aplicación utiliza esa clave. </li>
</ol>
A continuación, necesitará el ID de lista, que puede encontrar visitando sus Listas en Mailchimp. Haga clic en el enlace del menú Listas y al final de la fila a la derecha haga clic en el menú desplegable, luego elija Configuración. Desplácese hasta la parte inferior de esa página, dirá algo como "ID de lista para lista blahblah". Esta es la identificación de la lista que necesita usar.
    ');

jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'Clave API');
jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'ID de lista');