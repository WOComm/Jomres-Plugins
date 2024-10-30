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
// Because the server may be using a proxy for outgoing calls it's better to call the Jomres App server and ask it to respond with this server's IP address. Once we know that, then we are able to give the documentation the correct IP number to configure in Beds24's API Key N field(s)
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.ipify.org?format=json');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($cURLConnection, CURLOPT_TIMEOUT, 1);

$ip_number_response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($ip_number_response);

if (isset( $jsonArrayResponse->ip)) {
    $this_servers_ip_number = $jsonArrayResponse->ip;
} else {
    $this_servers_ip_number = 'Unknown, ask your server hosts support team';
}

jr_define ('BEDS24V2_CHANNEL_MANAGEMENT', 'Gerenciamento de canais (Beds24)');

jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24');
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Se você tem uma conta Beds24 e deseja atualizar Beds24 quando você tem uma reserva, selecione esta opção. Defina o URL para https://www.beds24.com/api/json/');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY', 'Este usuário não tem chaves de API definidas, então não pode continuar. Visite a página deles na página Gerenciamento de usuários> Gerenciadores de propriedades e crie uma nova chave de API para eles usando o link fornecido nessa página.');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Este usuário não possui propriedades Jomres que possam atribuir às propriedades Beds24, ou vice-versa');
jr_define ('BEDS24V2_NOT_SUBSCRIBED', "O gerente com o qual você está logado não parece ter uma conta no Beds24, então você precisará primeiro se registrar para o serviço e, em seguida, salvar esta chave API em <a href = 'https: / /www.beds24.com/control2.php?pagetype=accountpassword 'target =' _ blank '> site do Beds24 aqui. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY', "Copie e cole esta chave API no campo LINK em sua conta Beds24 para continuar.");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Quando tiver feito isso, clique no botão abaixo para continuar.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Vinculação de propriedade Beds24");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO', "Esta página permite que você visualize as propriedades às quais você tem acesso neste sistema, além das que existem no Gerenciador de Canais. Também permite importar propriedades do Gerenciador de Canais para este sistema, ou exportar propriedades existentes para o Channel Manager. <br/> Se você tem propriedades neste sistema e em Beds24 e deseja vinculá-las, você pode usar o aplicativo Property para fazer isso. Visite Beds24> Configurações> Propriedades (certifique-se de que a propriedade selecionada na lista suspensa é a mesma que você deseja vincular) e, no submenu Link, salve a 'propriedade apikey' no campo 'propKey' em Beds24. Depois de fazer isso, recarregue a página. Este sistema irá veja se as duas propriedades estão associadas à mesma chave e crie as associações necessárias. Depois que as duas propriedades estiverem vinculadas, lembre-se de visitar a página Exibir propriedade, encontrar o URL de notificação e colá-lo no campo 'URL de notificação' da página Link. Aquilo vai certifique-se de que a Beds24 use o link correto para sincronizar as reservas com aquela propriedade ao receber as reservas. ");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Erro: não há propriedades que você possa vincular em Beds24. Isso pode ocorrer porque todas as propriedades às quais você tem direitos já foram vinculadas a outra conta neste sistema.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Propriedade uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Nome da propriedade");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Uid de propriedade Beds24");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Nome da propriedade Beds24");
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Propriedade apikey");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "Importar");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Configurar tipos de quartos");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Aqui você precisa vincular os tipos de quarto em sua conta Beds24 com aqueles armazenados neste sistema.");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Tipo de quarto Beds24");

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Não é possível importar esta propriedade ainda porque você não configurou a chave da propriedade na página Link da propriedade.");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Não é possível importar esta propriedade ainda porque não tem quartos. Por favor, crie um ou mais quartos (os quartos em Beds24 são iguais aos tipos de quarto em Jomres) e não se esqueça de definir o preço mínimo . Depois de fazer isso, você pode importar o tipo de quarto para Jomres e associá-los aos tipos de quarto Jomres atuais. Depois disso, você poderá modificar as tarifas, mas um preço mínimo precisa ser definido. ");
jr_define ('_BEDS24_SUGGESTED_KEY', "Sugerimos que você use esta chave API. Quando tiver feito isso, recarregue esta página.");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "Exportar");
jr_define ('BEDS24V2_REST_API_INTRO', "Aqui você pode ver seu par de chaves REST API e o caminho para a API. Se você salvar esses detalhes em sua conta em Beds24, Beds24 24 poderá entrar em contato com este site por meio de sua API.");
jr_define ('BEDS24V2_REST_API_CLIENT_ID', "ID do cliente");
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "Segredo do cliente");
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (ponto final)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "Ver propriedade");
jr_define ('BEDS24_ROOM_TYPES_TITLE', "Associações de tipo de quarto");

jr_define ('BEDS24_ROOM_TYPES_INFO', "Esta página permite que você associe seus tipos de quarto àqueles armazenados nos servidores Beds24.");
jr_define ('BEDS24_ROOM_TYPES_INFO2', "Até que os tipos de quarto sejam vinculados, você não pode receber as informações de reserva enviadas por Beds24. Se sua propriedade foi importada / exportada de ou para Beds24, então criamos links automaticamente para você, no entanto, se você adicionar um novo tipo de quarto, ou exclua um, então esta página pode ser usada para garantir que o tipo de quarto está corretamente associado. ");
jr_define ('BEDS24_ROOM_TYPES_INFO3', "Escolha os tipos de quarto Beds24 que deseja associar aos tipos de quarto neste sistema e, quando terminar, clique em Salvar para atualizar as alterações em Beds24.");
jr_define ('BEDS24_ROOM_TYPES_YOURS', "Seus tipos de quarto");
jr_define ('BEDS24_ROOM_TYPES_BEDS24', "Tipos de quartos Beds24");
jr_define ('BEDS24_ROOM_TYPES_NONE', "Esta propriedade não tem nenhum tipo de quarto, portanto não pode ser vinculada a nenhum tipo de quarto Beds24. Deseja importar tipos de quarto de Beds24?");
jr_define ('BEDS24_IMPORT_ROOMS', "Importar quartos");
jr_define ('BEDS24_EXPORT_BOOKINGS', "Exportar reservas");
jr_define ('BEDS24_IMPORT_BOOKINGS', "Importar reservas");
jr_define ('BEDS24_IMPORT_EXPORT', "Você pode importar e exportar reservas existentes de e para Beds24 com o clique de um botão. As reservas importadas de Beds24 são importadas de ontem e incluirão todas as reservas do próximo ano. Você só deve usar esses botões depois primeiro importando ou exportando a propriedade para o sistema. Uma vez configurada, a importação e / ou exportação será feita automaticamente. ");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Atualizar preços para Beds24?");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Você pode escolher atualizar Beds24 apenas com disponibilidade ou disponibilidade e preços. Se você usar tiver situações específicas onde deseja usar o painel de controle Beds24 para definir preços específicos para canais específicos, você deve deixar esta opção Não.");
jr_define ('_BEDS24_CONTROL_PANEL_DIRECT', "Link direto");
jr_define ('BEDS24_IMPORT_NOTIFICATION_URLS', "Se você importou esta propriedade para Jomres, você precisará alterar manualmente o URL de notificação em seu Beds24 -> Propriedade -> Configurações de link para o seguinte:");
jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Você não tem nenhuma propriedade associada às propriedades de Beds24. Você deve redefinir as chaves de API de seu gerente antes de permitir que seus gerentes tentem se conectar com Beds24. Isso garantirá que todos tenham chaves exclusivas.");
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD', "Redefinir as chaves da API do gerenciador agora");
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS', "Ignorar aviso");
jr_define ('BEDS24V2_ERROR_KEYS_DONE', "Chaves da API do gerenciador foram redefinidas");

jr_define ('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Links de propriedade Beds24");
jr_define ('BEDS24_ASSIGN_MANAGER', "Gerente de mudanças Beds24");
jr_define ('BEDS24_ASSIGN_MANAGER_DESC', "Quando um gerente visualiza a página Channel Management (Bed24) no frontend, todas as propriedades que compartilham uma chave API em Jomres e Beds24 são automaticamente vinculadas a Jomres. Da mesma forma, todas as propriedades importadas ou exportadas pelo gerente estão vinculados. Você pode alterar o gerente ao qual uma propriedade está vinculada alterando a lista suspensa do gerente nesta página e clicando em Salvar. ");
jr_define ('BEDS24V2_TARIFFS_TITLE', "Exportação tarifária");
jr_define ('BEDS24V2_TARIFF_EXPORT_DESC', "Você pode exportar as tarifas que criou para Beds24 para uma taxa diária específica. Se você for usar este recurso, você deve definir a opção 'Atualizar preços para Beds24?' em Configuração de propriedade como Não. Você também pode ser necessário configurar sua propriedade no painel de controle Beds24 para que você possa ter várias diárias. Para fazer isso, vá para Configurações> Propriedades> Quartos> Preços diários e configure o 'Número de Preços Diários' para o número de preços que você deseja . Depois de fazer isso, você poderá clicar em um dos botões P para definir essa taxa diária. ");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Nome da tarifa");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Tipo de quarto");
jr_define ('BEDS24V2_BOOKING_RESEND', "Reenviar notificação");
jr_define ('BEDS24V2_BOOKING_DATA_AT_B24', "Estas são as informações de reserva armazenadas em Beds24. A menos que você tenha certeza de que os dados estão incorretos, você não precisa reenviar a reserva para Beds24.");
jr_define ('BEDS24V2_BOOKING_NO_DATA_AT_B24', "Esta reserva não parece estar associada a uma reserva em Beds24. Você pode usar o botão Reenviar para exportar esta reserva para beds24.");

jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonimar convidados?");
jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Quando as reservas são enviadas ao gerente do canal, recomendamos que você anonima os detalhes do convidado. Se definir esta opção para sim, quando as informações de reserva forem enviadas ao gerente do canal o nome do convidado e o endereço de e-mail não são . Os OTAs terão um registro preciso da sua disponibilidade, sem que você precise compartilhar mais informações do que o necessário. Isso significa que você está em conformidade com o GDPR porque se o convidado posteriormente decidir excluir seus dados neste sistema (você não será notificado quando isso acontece), seus detalhes não são deixados com outros controladores de dados sobre os quais você não tem controle. Se necessário, você ainda pode fazer uma referência cruzada de reservas neste sistema com aquelas no gerenciador de canal, a página Detalhes de reserva mostrará o número de reserva para esta reserva como está armazenada no gerenciador de canal. ");
jr_define ('BEDS24V2_MASTER_APIKEY', "RECURSO EXPERIMENTAL - chave API Master Beds24");
jr_define ('BEDS24V2_MASTER_APIKEY_DESC', "SE VOCÊ JÁ TIVER UMA INSTALAÇÃO DE JOMRES COM PROPRIEDADES LIGADAS A CAMAS24 LEIA TODA A DESCRIÇÃO AQUI. Por padrão, Jomres é projetado para ser uma plataforma de reserva de vários fornecedores. Os gerentes que possuem suas próprias contas24 podem importar contas. propriedades de e para beds24 com segurança. Esta configuração permite que você substitua essa funcionalidade por ter uma única chave de API para todas as propriedades. Isso significa que você só precisa de uma conta com Beds24, no entanto, também significa que todas as cobranças serão acumuladas por essa conta. Qualquer gerente com acesso a uma propriedade será capaz de enviar atualizações para a propriedade nos servidores Beds24. Deixe em branco para ignorar esta configuração e forçar os gerentes de propriedade a usarem suas próprias contas Beds24. A chave de API pode assumir qualquer forma que você quiser, por muito tempo pois a chave aqui corresponde àquela na <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> <em> Chave API 1 </em> </ a> campo. SE VOCÊ JÁ POSSUI INSTALAÇÃO ON OF JOMRES COM PROPRIEDADES LINKED TO BEDS24: Você pode alternar para usar este recurso, no entanto, seria necessário que você primeiro truncar (esvaziar) essas tabelas, excluir as propriedades existentes que já estão em Jomres e, então, reimportar as propriedades de Beds24 em Jomres. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Ao definir sua chave de API na seção <em> API Key N </em> da página de acesso à conta de Beds24, é vital que você defina o campo <em> API Key Access </em> como ' Permitir apenas IP da lista de permissões 'e você define o número do IP para <strong> ". $this_servers_ip_number." </strong> Isso se aplica igualmente para a configuração da chave de API mestre aqui e no front-end se um gerente de propriedade estiver configurando sua própria API individual chaves." );
jr_define ('BEDS24V2_WHITELIST_WARNING', "Se suas propriedades já foram conectadas a Beds24, esteja ciente de que Beds24 introduziu recentemente uma política em que todos os servidores conectados à sua conta devem estar na lista de permissões. Você pode fazer isso na página Acesso à conta, onde sua chave de acesso foi inserida. Selecione o menu suspenso Whitelist IP e defina o número do IP para ");