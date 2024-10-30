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


jr_define ('_JINTOUR_TITLE', "Gerenciamento de passeios / atividades");

jr_define ('_JINTOUR_PROFILES_TITLE', "Perfis de passeios / atividades");
jr_define ('_JINTOUR_PROFILES_NEW', "Novo tour / perfil de atividade");
jr_define ('_JINTOUR_PROFILES_DELETE', "Excluir tour / perfil de atividade");

jr_define ('_JINTOUR_PROFILE_TITLE', "Título do perfil");
jr_define ('_JINTOUR_PROFILE_DESCRIPTION', "Descrição");
jr_define ('_JINTOUR_PROFILE_DESCRIPTION_INFO', "Insira uma descrição de seu passeio / atividade, incluindo seu itinerário.");
jr_define ('_JINTOUR_PROFILE_DAYS_OF_WEEK', "Dias da semana");
jr_define ('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO', "");
jr_define ('_JINTOUR_PROFILE_PRICE_ADULTS', "Preço adulto");
jr_define ('_JINTOUR_PROFILE_PRICE_KIDS', "Preço infantil");
jr_define ('_JINTOUR_PROFILE_PRICE_KIDS_INFO', "Para excluir uma opção de aparecer no formulário de reserva, deixe o preço como 0 (zero)");
jr_define ('_JINTOUR_PROFILE_SPACES_ADULTS', "Espaços adultos");
jr_define ('_JINTOUR_PROFILE_SPACES_KIDS', "Espaços filhos");
jr_define ('_JINTOUR_PROFILE_SPACES_INFO', "O número de vagas disponíveis no passeio / atividade");
jr_define ('_JINTOUR_PROFILE_START_DATE', "Início da temporada");
jr_define ('_JINTOUR_PROFILE_END_DATE', "Fim da temporada");

jr_define ('_JINTOUR_PROFILE_GENERATE_INFO', "Depois de criar um perfil de passeio / atividade, você precisará gerar passeios / atividades com base nas configurações desse perfil. Crie o passeio / atividade e clique no ícone de seta verde ao lado desse perfil para criar o passeios / atividades em si. Uma vez que os passeios / atividades tenham sido criados, você poderá excluir passeios / atividades individuais se desejar. ");
jr_define ('_JINTOUR_PROFILE_GENERATE', "Gerar passeios / atividades");

jr_define ('_JINTOUR_TOUR_TITLE', "Título da atividade");
jr_define ('_JINTOUR_TOUR_DATE', "Data");
jr_define ('_JINTOUR_TOUR_ADULTS', "Adultos");
jr_define ('_JINTOUR_TOUR_KIDS', "Crianças");
jr_define ('_JINTOUR_TOUR_ITINERY', "Itinerário");

jr_define ('_JINTOUR_TOUR_SAVE_AUDIT', "Novos passeios gerados");
jr_define ('_JINTOUR_TOUR_CANCEL_AUDIT', "Reserva de tour cancelada");
jr_define ('_JINTOUR_TOUR_SAVE_MESSAGE', "Novos passeios gerados");
jr_define ('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE', "Espaços disponíveis atualmente");

jr_define ('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT', "Nova reserva para tour / recurso id");
jr_define ('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE', "Uma nova reserva para um tour / recurso do administrador foi feita. Por favor, veja o seguinte link para ver a página da área do administrador desse tour");

jr_define ('_JINTOUR_TITLE_CONFIG', "Jomres Integrated Tours Configuration");
jr_define ('_JINTOUR_TITLE_WHOLESITE', "A instalação inteira é uma instalação Jintour?");
jr_define ('_JINTOUR_TITLE_WHOLESITE_DESC', "Se definir como Sim, todas as propriedades serão propriedades do passeio. Se definir como Não, então, quando novas propriedades forem criadas, você poderá ter propriedades do tipo Tour e Hotel / Apartamento. ");

jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS', "Passeios");
jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC', "Escolha a opção de passeios se você estiver oferecendo reservas para itens que estão disponíveis em certas datas (por exemplo, passeios, ingressos para um show.)");
jr_define ('_JINTOUR_SHOWDEPARTURE', "Mostrar o campo de entrada de embarque?");
jr_define ('_JINTOUR_SHOWDEPARTURE_DESC', "Defina como Sim se quiser mostrar uma data de chegada e de partida. Isso seria útil se você estiver oferecendo viagens de ônibus, passagens aéreas etc. onde você precisa saber as datas de entrada e saída, mostrar a data de partida permite que você ofereça recursos em várias datas, ao passo que, com a configuração definida como Não, apenas as reservas para uma data podem ser aceitas. ");

jr_define ('_JINTOUR_PROFILES_TITLE_LIST', "Lista de Passeios");