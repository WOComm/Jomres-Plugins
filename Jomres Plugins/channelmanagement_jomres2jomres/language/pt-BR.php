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


jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Integração Jomres 2 Jomres");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "ID do cliente do site pai");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "O ID do cliente do site pai. No site pai, você precisará de um ID de cliente exclusivo e segredo com todos os plug-ins de recursos da API instalados, o plug-in do Channel Management Framework instalado e quando você criar / editar o ID do cliente / par de chaves secretas, você precisará fornecer acesso a todos os escopos disponíveis. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Segredo do cliente do site pai");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "O segredo do cliente do site pai");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "URL principal");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "O url para o site pai Jomres.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Erro, o ID do cliente do site pai não está definido. Visite a guia Configuração do site> Contas do gerenciador de canais para salvar o ID do cliente.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Erro, o segredo do site pai não foi definido. Visite a guia Configuração do site> Contas do gerenciador de canais para salvar o seu segredo.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Erro, o URL secreto do site pai não foi definido. Visite a guia Configuração do site> Contas do gerenciador de canais para salvar o url do site pai.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Erro, seu ID de cliente não está definido. Visite Configuração do site> guia Contas do gerente de canal para salvar seu nome de usuário.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Erro, seu ID de cliente não está definido. Visite Configuração do site> guia Contas do gerente de canal para salvar sua senha.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Configuração de canal");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: Importar novas propriedades.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORTAR");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORT");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "Id da propriedade não definida");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Itens de dicionário mapeados não definidos");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Tipo de propriedade local não encontrado. Se o tipo de propriedade foi criado, certifique-se de ter mapeado o tipo de propriedade do serviço remoto para o tipo de propriedade local.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Tipo de propriedade remota não retornado pelo canal.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Tipo de propriedade local não aprovado.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Não foi possível determinar o modelo de reserva (mrp ou srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Não foi possível determinar o modelo de reserva (mrp ou srp) após encontrar o id do tipo de propriedade.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Não foi possível determinar o código do país");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "Não foi possível determinar o id da região");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Não foi possível validar corretamente a matriz de configurações");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Tipos de propriedade não mapeados pelo administrador");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Características de propriedade não mapeadas pelo administrador");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Tipos de quartos não mapeados pelo administrador");
