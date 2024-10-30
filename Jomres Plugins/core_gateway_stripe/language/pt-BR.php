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

jr_define ('STRIPE_TITLE', "Stripe");
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Este gateway Stripe foi projetado especificamente para permitir que você, como gerente do local, receba uma parte dos pagamentos feitos aos gerentes de propriedade no momento da reserva. Antes de poder ser usado, você deve primeiro configurar sua própria integração com o Stripe Conecte-se. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Documentação para este plug-in pode ser encontrada aqui. </a> <br/> Se você clicar em Salvar nesta página, para permitir que este plug-in funcione perfeitamente todos os outros gateways serão desativados </ forte> Antes de começar, certifique-se de ter acessado a página do Stripe Connect e indicado que está configurando uma plataforma. Depois de fazer isso, siga as instruções na tela para configurar sua conta. Antes que os gerentes possam conectar suas contas à sua, você deve visitar Configurações> Configurações de conexão e na área \"Configurações de OAuth\" OAuth habilitado para contas padrão e clique em Salvar (observe que você precisará fazer isso nos modos Teste e Ao vivo). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Conecte-se conosco!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Você se registrou, mas a conexão ainda não foi concluída. Você precisa conectar sua conta Stripe ao nosso site. Depois de fazer isso, você pode adicionar todas as suas propriedades ao nosso site e começar a aceitar reservas . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Bem-vindo a");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Antes de começar a configurar sua (s) propriedade (s), você precisa nos conectar com sua conta Stripe. Clique no link para começar.");

jr_define ('STRIPE_SETUP_INFO', "Agora precisamos conectar sua conta à nossa, isso nos permitirá receber pagamentos em seu nome, então clique no botão Conectar para ser levado ao Stripe, onde você pode confirmar a conexão.");
jr_define ('STRIPE_SETUP_DONE', "Você já está conectado conosco, nada mais a fazer aqui! Feche esta janela e vamos continuar com o negócio do negócio.");
jr_define ('STRIPE_SETUP_THANKS', "Obrigado por se conectar a nós! Você pode fechar esta janela agora.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Desconecte sua conta.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Conta desconectada, você pode fechar esta janela agora.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "ID do cliente Stripe Connect");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Você pode obter seu ID de cliente do Stripe em <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Painel> Configurações> Conectar API as chaves estão na opção de menu Desenvolvedores. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Certifique-se de definir seu URI de redirecionamento em <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Conectar> Configurações </a> para <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Chave secreta");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Chave pública");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Sua Comissão");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Esta comissão é retirada do pagamento enviado ao gerente da propriedade no momento da reserva. Ela é então colocada em sua conta do Stripe pelo Stripe. <br/> Esta é a porcentagem de comissão que você cobrará dos gerentes de propriedade As suas reservas. A sua comissão é cobrada com base no custo TOTAL da reserva, não no valor do depósito. <br/> Independentemente do que definir este valor, recomendamos que configure a Configuração do Site -> Formulário de Reserva -> Valor de Depósito Mínimo como pelo menos o dobro desse valor, então se você quiser cobrar 10% de comissão, então você deve fazer o Depósito Mínimo de 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Stripe Fee European");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Esta é a porcentagem que o Stripe cobra para fazer pagamentos em seu site. Atualmente, eles cobram 1,4% para cartões europeus e 2,9% para cartões não europeus. Este valor é necessário para determinar os preços na reserva e prazo de pagamento. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Taxa de tarja não euro");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Número do cartão");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Validade (MM / AA)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Billing Zip");

jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Formulário de pagamento seguro");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Detalhes de cobrança");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Detalhes do cartão");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Nome do titular do cartão");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Pague agora");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Para pagar agora");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'A rua é obrigatória e não pode estar vazia');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'A rua deve ter mais de 6 e menos de 96 caracteres');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'A cidade é obrigatória e não pode estar vazia');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'O zip é obrigatório e não pode estar vazio');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'O zip deve ter mais de 3 e menos de 12 caracteres');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'O endereço de email é obrigatório e não pode estar vazio');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'A entrada não é um endereço de email válido');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'O email deve ter mais de 6 e menos de 65 caracteres');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'O nome do titular do cartão é obrigatório e não pode estar vazio');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'O nome do titular do cartão deve ter mais de 6 e menos de 70 caracteres');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'O número do cartão de crédito é obrigatório e não pode estar vazio');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'O número do cartão de crédito é inválido');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'O mês de validade é obrigatório');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'O mês de validade pode conter apenas dígitos');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'O ano de validade é obrigatório');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'O ano de validade pode conter apenas dígitos');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'O cvv é obrigatório e não pode estar vazio');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'O valor não é um CVV válido');

jr_define ('STRIPE_PAYMENT_FAILED', "Desculpe, não foi possível processar seu pagamento neste momento.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Por favor, tente novamente");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Pagamento recusado.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Muitos pedidos feitos para a API muito rapidamente");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Parâmetros inválidos foram fornecidos à API do Stripe");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Falha na autenticação com API do Stripe");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "A comunicação de rede com Stripe falhou (sua conexão de internet caiu?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Ocorreu um erro não detectado");
