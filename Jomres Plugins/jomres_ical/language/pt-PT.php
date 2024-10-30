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


jr_define ('_JOMRES_ICAL_EVENT', 'Evento iCal');
jr_define ('_JOMRES_ICAL_FEED', 'iCal Feed');
jr_define ('_JOMRES_ICAL_FEED_LINK', 'URL do feed iCal');
jr_define ('_JOMRES_ICAL_FEEDS', 'iCal Feed / s');
jr_define ('_JOMRES_ICAL_FEEDS_DESC', 'Seu (s) feed (s) iCal pode (m) exibir as próximas reservas em uma agenda remota, incluindo seu dispositivo móvel, Google Agenda, Apple Calendar, Thunderbird, Outlook e muito mais. Use o (s) seguinte (s) URL (s) para se inscrever em feed (s) seu software de calendário. ');
jr_define ('_JOMRES_ICAL_ANON', 'URL de feed iCal anônimo');
jr_define ('_JOMRES_ICAL_ALLOW_ANON', 'Permitir acesso anônimo a feed / s do iCal?');
jr_define ('_JOMRES_ICAL_ALLOW_ANON_DESC', 'Se esta opção estiver habilitada, seu feed de eventos iCal estará disponível para todos, mas sem detalhes de reserva ou convidado.');
jr_define ('_JOMRES_ICAL_IMPORT', 'Importação iCal');
jr_define ('_JOMRES_ICAL_SELECT', 'Selecione o arquivo para importar');
jr_define ('_JOMRES_ICAL_NO_FILE_UPLOADED', 'Erro, nenhum arquivo foi enviado.');
jr_define ('_JOMRES_ICAL_IMPORT_INFO', "Ao importar um arquivo iCal, a data de término do evento deve ser a data de saída do convidado. O resumo deve ser o nome do convidado. A descrição do evento pode conter todos os outros detalhes.");

jr_define ('_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Este número de reserva já existe no sistema.');
jr_define ('_JOMRES_ICAL_ERROR_NO_ROOMS', 'Não há quartos disponíveis nas datas selecionadas.');
jr_define ('_JOMRES_ICAL_ERROR_NO_EVENTS', 'Nenhum evento foi encontrado no arquivo ics.');
jr_define ('_JOMRES_ICAL_SUCCESS', 'Evento importado com sucesso');
jr_define ('_JOMRES_ICAL_FAILURE', 'O evento não pôde ser importado');

jr_define ('_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Nome do convidado');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Descrição do evento');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_START', 'Iniciar');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_END', 'Fim');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Resultado');
jr_define ('_JOMRES_ICAL_WITHHELD', 'Retido');
jr_define ('_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Seu (s) feed (s) de iCal podem exibir as próximas reservas em um calendário remoto, incluindo seu dispositivo móvel, Google Calendar, Apple Calendar, Thunderbird, Outlook e muito mais.');
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Este recurso permite que você sincronize reservas de sites como Airbnb, Homeway e outros para Jomres. Você terá que inserir o URL do feed iCal de sua propriedade para cada site com o qual deseja sincronizar. Se alguém quiser reservar sua propriedade no Airbnb, por exemplo, essas datas serão mostradas como bloqueadas (reservas negras) neste site da Jomres também, então ninguém pode reservar essas datas aqui. Isso não sincronizará os detalhes da reserva entre os sites (como detalhes do hóspede, preços, faturas, etc), mas é uma maneira fácil e agradável de evitar duplas reservas sincronizando apenas a disponibilidade. ');
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS', 'Configurações de sincronização do iCal');
jr_define ('_JOMRES_ICAL_FEED_SETTINGS', 'Configurações de feed iCal');
jr_define ('_JOMRES_ICAL_SYNC_URL1', 'URL externo do iCal');
jr_define ('_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Incluir também pedidos de reserva?');
jr_define ('_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Se ativado, também incluirá reservas que ainda não foram aprovadas (se o recurso de aprovação de reservas estiver ativado). Manter esta opção desativada é uma ótima maneira de ocultar reservas do calendário que podem estar aguardando confirmação em um status não aprovado / consulta. Se as reservas não exigirem aprovação (o recurso de aprovação de reservas está desativado), todas as reservas serão exportadas. ');

jr_define ('_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_URL', 'URL remoto');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'UID da sala');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Nome / número da sala');
jr_define ('_JOMRES_ICAL_REMOTE_INFO', "Selecione a sala que este feed afetará e o url do site remoto. Ao importar um arquivo iCal, a data de término do evento deve ser a data de partida do convidado. O resumo deve ser o nome do convidado. Evento a descrição pode conter todos os outros detalhes. ");

jr_define ('_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Feed remoto Ical criado');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Feed remoto Ical excluído');