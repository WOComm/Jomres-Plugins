<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Translated to pt-PT by Mario Oliveira, Camara de Lobos, Madeira Island, Portugal, 17Set2010 - www.marioliveira.net - Updated 21Jun2011 for ver 5.1
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('Direct Access to this file is not allowed.');
//#################################################################


jr_define ('_JOMRES_PROPERTY_IMPORT_TITLE', "Importação de propriedade");
jr_define ('_JOMRES_PROPERTY_IMPORT_DESC', "Este recurso permite importar propriedades via arquivo CSV. Por causa das várias verificações necessárias, recomendamos que você limite o número de propriedades criadas a lotes de no máximo 50 por vez.");
jr_define ('_JOMRES_PROPERTY_IMPORT_SELECT', "Por favor, escolha o arquivo que deseja enviar.");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS', "O arquivo csv deve ter 11 colunas, e os campos não devem conter nenhum html. Todos os campos são obrigatórios.");

jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME', "Nome da propriedade");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE', "Texto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS', "O número de quartos (se esta for uma villa / casa de campo, independentemente do número de quartos na propriedade real, então deve ser 1. Apenas hotéis / pousadas etc devem ter mais de um quarto). Inteiro . ");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE', "Inteiro");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE', "Preço por noite sem códigos de moeda.");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE', "Flutuar");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS', "Endereço de email");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE', "Texto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET', "Rua");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE', "Texto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN', "Cidade");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE', "Texto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION', "Região. Isso precisa corresponder aos ids das regiões armazenadas na tabela Regiões");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE', "Inteiro");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY', "País da propriedade. Código abreviado, por exemplo, GB ou DE, não o nome completo do país");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE', "Texto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE', "Código postal");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE', "Texto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE', "Número de telefone");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE', "Texto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION', "A descrição completa da propriedade. Máximo de 500 caracteres");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE', "Texto");

jr_define ('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT', "Erro, tipo de propriedade não foi definido.");
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE', "Erro, não temos nenhum tipo de quarto para esse tipo de propriedade. Você pode corrigir isso visitando Estrutura do Site na área do administrador.");
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_FILE', "Opa, você se esqueceu de enviar um arquivo?");

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS', "Muitas colunas encontradas, o arquivo está malformado ou os dados csv não foram construídos corretamente.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET', "O nome da propriedade não foi definido.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT', "O número de quartos não foi definido.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET', "Preço por noite não foi definido.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS', "Não foi possível validar o endereço de e-mail.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET', "A rua não foi definida.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN', "A cidade não foi definida.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION', "A região não foi definida.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY', "O país não foi definido.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE', "Código postal não foi definido.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE', "Telefone não configurado.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION', "Descrição não definida.");

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS', "A propriedade foi importada com sucesso!");

jr_define ('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES', "Como você tem uma ou mais propriedades que falharam na importação, exportamos apenas essas propriedades para o campo abaixo. Você pode copiar essas propriedades em excel / open office calc / sua escolha de manipulador de arquivo CSV e corrigir os problemas sem ter que reimportar todas as propriedades novamente. ");