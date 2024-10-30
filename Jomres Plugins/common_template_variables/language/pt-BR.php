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


jr_define ('_COMMON_STRINGS_TITLE', "Variáveis de template comuns");

jr_define ('_COMMON_STRINGS_INFO', "Ferramenta de desenvolvedor. Projetada para mostrar aos desenvolvedores strings comuns que estão disponíveis para todos os modelos sem a necessidade de adicioná-los ao script de chamada do modelo. <br/> Por exemplo, nesta lista está a definição COMMON_NEXT. Um desenvolvedor pode adicioná-lo a um modelo Jomres sem ter que defini-lo no script de chamada. Você adicionaria a string comum ao modelo como qualquer outra string, colocando &#123;COMMON_NEXT&#125; no modelo. <br/> Na lista abaixo, você verá a constante conforme definida no arquivo de idioma, e ao lado dela a saída que ela mostrará (sujeito a haver qualquer personalização de linguagem específica de propriedade). Observação, no caso da constante 'COMMON_LAST_VIEWED_PROPERTY_UID', a propriedade uid varia e não é mostrada nesta lista. ");
jr_define ('_COMMON_STRINGS_CONSTANT', "Constante");
jr_define ('_COMMON_STRINGS_VALUE', "Saída");