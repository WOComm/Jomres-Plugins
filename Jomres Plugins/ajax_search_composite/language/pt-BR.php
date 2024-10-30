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
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE', "Ajax Search Composite");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Pesquisar por estrelas");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Pesquisa por preços");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Pesquisa por recursos");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Pesquisar por país");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Pesquisar por região");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Pesquisar por cidade");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Pesquisar por tipo de quarto");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Pesquisa por tipo de propriedade");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Pesquisar por números de convidados");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Pesquisa por datas");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "Estilo do modelo");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Padrão: principalmente caixas de seleção ou botões simples se estiver no Bootstrap. Modais: botões abertos para permitir que os usuários selecionem filtros de pesquisa. Acordeão projetado para a parte superior da página, áreas deslizam para baixo para revelar os filtros. Seleção múltipla: botões suspensos para revelar filtros. ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Botões (orientação vertical)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Modais (orientação vertical) Bootstrap apenas.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Accordion (orientação horizontal) Bootstrap apenas.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Multiselect (orientação horizontal) Bootstrap apenas.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "Mostrar filtros");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Ocultar filtros");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "Usa a estrutura de pesquisa ajax. Permite que você coloque um módulo de pesquisa que oferece pesquisa de disponibilidade, faixa de preço, características, tipo de propriedade, tipo de quarto, número de hóspedes, estrelas, país, região e cidade em uma barra lateral ou barra superior. Observe que o exemplo mostrado aqui não funcionará como alguns dos argumentos se cancelam, escolha apenas o que você precisa dos argumentos disponíveis (exceto para o argumento obrigatório). Este shortcode é um pouco diferente da maioria dos outros shortcodes, pois deve ser acompanhado por um div especial após a declaração shortcode com um id de asamodule_search_results que é onde o plugin coloca a lista de propriedades retornada. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Obrigatório. O argumento deve ser ajax_search_composite");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "Estilo dos campos de pesquisa. As opções são botões modais acordeão multisseleção Se não for definido, o plug-in usará a opção configurada em Configuração do site. Seleção múltipla / acordeão são ideais para exibição horizontal, as outras duas opções são melhores para colocação em uma barra lateral. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Mostrar o formulário de pesquisa se a tarefa da página estiver definida como viewproperty (a página de detalhes da propriedade). 0 para Não, 1 para Sim.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Pré-filtragem é onde você escolhe apenas as propriedades que satisfazem a condição de pré-filtro podem ser mostradas nos resultados da pesquisa. Pré-filtrar por propriedade uid Argumentos, então apenas certas propriedades podem ser mostradas nos resultados da pesquisa. lista separada por vírgulas de uids de propriedade ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Pré-filtrar por tipo de propriedade, então apenas propriedades deste / desses tipos podem ser mostradas nos resultados da pesquisa. Os argumentos são uma lista separada por vírgulas de ids de tipo de propriedade.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Pré-filtrar por código de país, então apenas propriedades nesses países podem ser mostradas nos resultados da pesquisa. Os argumentos são uma lista separada por vírgulas de códigos de país ISO.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "Pré-filtrar por nome de região, portanto, apenas as propriedades nessas regiões podem ser mostradas nos resultados da pesquisa. Os argumentos são uma lista separada por vírgulas de nomes de regiões e devem corresponder às regiões conforme armazenadas no banco de dados. Se você definir o país como, por exemplo, Alemanha (DE), então as propriedades de outros países com nomes de região semelhantes não serão mostradas. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Ativar / desativar a entrada Estrelas no formulário. Esteja ciente de que se você definiu uma opção por meio da guia de configurações compostas de pesquisa Ajax em Configuração do site como Não, então definir asc_by_stars na lista de argumentos não terá efeito. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Ativar / desativar a entrada Estrelas no formulário. Esteja ciente de que se você definiu uma opção por meio da guia de configurações compostas de pesquisa Ajax em Configuração do site como Não, então definir asc_by_price na lista de argumentos não terá efeito. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Ativar / desativar a entrada de recursos de propriedade no formulário. Esteja ciente de que se você tiver definido uma opção por meio da guia de configurações compostas de pesquisa Ajax em Configuração do site como Não, então definir asc_by_features na lista de argumentos não terá efeito . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Ativar / desativar a entrada País no formulário. Esteja ciente de que se você tiver definido uma opção por meio da guia de configurações compostas de pesquisa Ajax em Configuração do site como Não, então definir asc_by_country na lista de argumentos não terá efeito. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Ativar / desativar a entrada Região no formulário. Esteja ciente de que se você definiu uma opção por meio da guia de configurações compostas de pesquisa Ajax em Configuração do site como Não, então definir asc_by_region na lista de argumentos não terá efeito. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Ativar / desativar a entrada Cidade no formulário. Esteja ciente de que se você definiu uma opção por meio da guia de configurações compostas de pesquisa Ajax em Configuração do site como Não, então definir asc_by_town na lista de argumentos não terá efeito. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Ativar / desativar a entrada de tipo de quarto no formulário. Esteja ciente de que se você tiver definido uma opção por meio da guia de configurações compostas de pesquisa Ajax em Configuração do site como Não, então definir asc_by_roomtype na lista de argumentos não terá efeito . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Ativar / desativar a entrada de tipo de propriedade no formulário. Esteja ciente de que se você definiu uma opção por meio da guia de configurações compostas de pesquisa Ajax na configuração do site como Não, então a configuração asc_by_propertype não terá efeito na lista . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Ativar / desativar a entrada de números de convidados no formulário. Esteja ciente de que se você definiu uma opção por meio da guia de configurações compostas de pesquisa Ajax em Configuração do site como Não, então definir asc_by_guestnumber na lista não terá efeito . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Ativar / desativar a entrada de data no formulário. Esteja ciente de que se você definiu uma opção por meio da guia de configurações compostas de pesquisa Ajax em Configuração do site como Não, então definir asc_by_date na lista de argumentos não terá efeito. ");
