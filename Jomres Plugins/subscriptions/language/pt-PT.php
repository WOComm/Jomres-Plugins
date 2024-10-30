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


jr_define ('_SUBSCRIPTIONS_ACTIVE', "Ativo");
jr_define ('_SUBSCRIPTIONS_EXPIRED', "Não ativo");
jr_define ('_SUBSCRIPTIONS_HPAYMENT_STATUS', "Status de pagamento");
jr_define ('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL', "Nível");
jr_define ('_SUBSCRIPTIONS_EDIT_TITLE', "Editar assinatura");
jr_define ('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE', "Enviar email de lembrete de expiração de assinatura?");
jr_define ('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A', "Enviar lembrete por e-mail");
jr_define ('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B', "dias antes que a assinatura expire");
jr_define ('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE', "Enviar e-mail quando a assinatura expirar?");
jr_define ('_SUBSCRIPTIONS_MY', "Minhas assinaturas");
jr_define ('_SUBSCRIPTIONS_HRENEW', "Renovar");
jr_define ('_SUBSCRIPTIONS_HRENEWAL', "Renovação de assinatura");
jr_define ('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED', "Você já se inscreveu, por favor compre uma renovação.");
jr_define ('_SUBSCRIPTIONS_HEDIT', "Editar pacote de assinatura");
jr_define ('_SUBSCRIPTIONS_USERID_DESC', "Digite as primeiras letras do nome de usuário e você verá uma lista suspensa com nomes de usuário. Clique em um nome de usuário para selecioná-lo.");
jr_define ('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED', "Este pacote de assinatura não está mais disponível, portanto não pode ser renovado, por favor, considere atualizá-lo.");
jr_define ('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID', "Você não está inscrito neste pacote, portanto não pode renová-lo.");
jr_define ('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE', "Não há opções de renovação para este pacote");
jr_define ('_SUBSCRIPTIONS_CANCEL', "Cancelar assinatura");
jr_define ('_SUBSCRIPTIONS_HFREQUENCY_DAYS', "Frequência (dias)");
jr_define ('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC', "Duração da assinatura em dias");
jr_define ('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED', "Renovações não permitidas para este pacote.");
jr_define ('_SUBSCRIPTIONS_HRENEWAL_PRICE', "Preço de renovação");
jr_define ('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL', "Defina como 0 para desativar as renovações para este pacote ou insira um preço para a renovação");
jr_define ('_SUBSCRIPTIONS_HPACKAGE_FEATURES', "Opções de pacote");
jr_define ('_SUBSCRIPTIONS_HPACKAGE_DETAILS', "Detalhes do pacote");
jr_define ('_SUBSCRIPTIONS_HPACKAGE_YOUR', "Seu pacote de assinatura");
jr_define ('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED', "Seu pacote de assinatura não inclui acesso a este recurso. Para usar este recurso, você precisará atualizar sua assinatura.");
jr_define ('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Sua assinatura expirou e todas as suas listagens foram canceladas. Suas listagens não estão mais visíveis para os convidados e você não poderá mais receber reservas online de nosso site. Para continuar usando nossos serviços, publique suas listagens e comece a receber reservas online, faça login em sua conta e adquira uma renovação. ");
jr_define ('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1', "Sua assinatura em");
jr_define ('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2', "expirou");
jr_define ('_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1', "Esta é uma notificação para informá-lo de que sua assinatura irá expirar em breve. Para continuar usando nossos serviços, faça login em sua conta e adquira uma renovação.");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', "Pacotes de assinatura");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME', "Nome");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION', "Descrição");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED', "Publicado");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY', "Frequência");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT', "Preço");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT', "Limite de negócios");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC', "Número máximo de empresas que podem ser adicionadas com este pacote de assinatura");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE', "Inscrever-se");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_USE', "Usar funcionalidade de manipulação de assinatura");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', "Desculpe, mas esse ID de pacote não é reconhecido.");
jr_define ('_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', "Parece que você ainda não preencheu os detalhes da sua conta. Para listar sua propriedade no site, precisamos que você complete os detalhes da sua conta antes de prosseguirmos.");
jr_define ('_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED', "Você usou todos os slots de propriedade disponíveis em seu pacote de assinatura, então não será capaz de criar novas listagens. Atualize seu pacote se desejar criar mais listagens.");
jr_define ('_JOMRES_CHART_SUBSCRIPTIONS_DESC', "Renda por ano / mês");
jr_define ('_SUBSCRIPTION_WARNING', "Você habilitou inscrições, mas parece que ainda não criou nenhum pacote de inscrição. Os proprietários não poderão registrar propriedades em seu site até que pelo menos um pacote de inscrição seja criado.");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS', "Acesso à API");

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Você pode acessar este recurso atualizando para o " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Pacote de Assinatura. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Atualizar');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Inscrito');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Configurações do gateway de assinatura');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Você não está atualmente inscrito em nenhum pacote de assinatura. Por favor, assine um pacote para continuar usando nossos serviços.');
