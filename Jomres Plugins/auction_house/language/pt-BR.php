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


jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Casa de leilões");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Comprando");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Vender");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Casa de leilões");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Itens para os quais licitei");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Listar leilões");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Painel de propriedades");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Liste seus leilões");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Novo leilão");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Editar leilão");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Cancelar leilão");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Fim do leilão mais cedo");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Por favor, escolha a propriedade que deseja associar a este leilão.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Você está incluindo quartos / propriedade neste leilão?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Por favor, selecione os quartos que deseja incluir neste leilão. Primeiro escolha as datas para a reserva, então você pode selecionar os quartos.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Por favor, escolha as datas em que deseja reservar o imóvel como parte do leilão.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Termos e condições");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Termos e condições");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Termos e condições detalhados.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Título do leilão");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Descrição");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Valor deste leilão");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Por favor, informe o valor do pacote que você está oferecendo. Não será mostrado aos compradores.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Reservar");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Reserva não atendida");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Compre agora");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Por quantos dias esse leilão deve durar?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Reserva da casa de leilões (não cancelar) para leilão:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Observe que, quando você licitar, sua fatura incluirá imposto adicional de");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Se você clicar no botão Licitar ou Comprar Agora, está celebrando um contrato juridicamente vinculativo para comprar o item ou pacote do vendedor. Este site não é responsável pelo conteúdo listado pelo vendedor.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Erro, você deve incluir um título.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Erro, você deve incluir uma descrição.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Leilões ativos");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Leilões concluídos");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Lance mais alto");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Sem lances");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Tempo restante");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Faça seu lance");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Seu lance foi colocado!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Você está ganhando este leilão!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Você foi superado!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Parabéns, você ganhou este leilão!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Desculpe, você perdeu este leilão.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Leilão terminou");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Desculpe, você não pode licitar neste leilão porque você não está logado.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Desculpe, você não pode licitar neste leilão porque ele terminou.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Desculpe, você não pode licitar neste leilão, não podemos encontrar o ID do leilão.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Desculpe, seu lance foi muito baixo.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Você não pode licitar em seu próprio leilão.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Você não pode licitar neste leilão ainda porque não inseriu seus dados. Por favor, clique no link acima 'Editar Conta' para preencher os detalhes de sua conta primeiro.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Desculpe, você não pode cancelar este leilão porque você não está logado.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Desculpe, você não pode cancelar este leilão porque ele já foi licitado. Somente leilões que não têm lances podem ser cancelados.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Desculpe, você não pode cancelar este leilão porque ele já terminou.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Desculpe, você não pode cancelar este leilão porque você não tem direitos de acesso a ele.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Suas listas de observação");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Número na lista");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Lista de observação");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Adicionar à lista de observação");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Adicionar lista de observação");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Digite o novo nome da lista");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Salvar nova lista de observação");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Leilão adicionado à lista");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Você ainda não tem nenhuma lista de observação. Você pode adicionar um leilão à sua lista de observação para criar sua primeira lista ou usar a opção Adicionar Lista de Observação no menu para adicionar manualmente uma lista.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Erro, essa lista de observação não existe.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Esta propriedade está participando de nosso programa de leilão e oferece um ou mais pacotes para leilão, consulte a lista abaixo.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Informações sobre");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Comissão do leilão");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Leilão:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Você fez um lance para leilão:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Você deu um lance para um leilão. Você pode ver o leilão visitando o seguinte link:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Seu lance foi superado! Leilão:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Você foi superado em um leilão. Você pode ver o leilão visitando o seguinte link:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Você ganhou um leilão! Leilão:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Você ganhou um leilão. Você pode ver o leilão visitando o seguinte link:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Certifique-se de pagar ao vendedor imediatamente. Sua fatura está aqui:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "O leilão terminou. Leilão:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Este leilão terminou. Você pode ver o leilão aqui:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Leilão concluído. Seguem os detalhes do vencedor:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Exibe a página da Casa de Leilões.");