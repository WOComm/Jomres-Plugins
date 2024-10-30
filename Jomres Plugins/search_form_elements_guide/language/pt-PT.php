<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 * @version Jomres 10.7.0
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/
//#################################################################
	defined('_JOMRES_INITCHECK') or die('');
	//#################################################################

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Guia de Elementos de Formulário de Pesquisa" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Instale o plug-in Search Form Elements para adicionar formulários de pesquisa ao seu site usando os códigos de acesso mostrados aqui. Esta página mostra quais códigos de acesso estão disponíveis para que você possa criar exatamente os formulários de pesquisa necessários para o seu site . Você pode copiar esses códigos e colá-los diretamente em sua página/artigo/módulo e começar a trabalhar no layout. Na parte inferior da página, você verá vários exemplos de formulários de pesquisa. Clique no botão para abrir um modal e use o botão Copiar para copiar a marcação para a área de transferência. Você pode usar essa marcação em seus artigos/módulos para criar os formulários de pesquisa." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Estes são todos os códigos de acesso disponíveis para você ao criar formulários de pesquisa." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Exemplos" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Você pode usar qualquer um dos shortcodes aqui nesta página para modificar os exemplos fornecidos, ou usar os exemplos como estão. Copie e cole os shortcodes e/ou exemplos em uma página, artigo ou módulo para ver o Formulário de pesquisa." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Você deve sempre incluir os shortcodes form_start, form_button e form_end em seu formulário de pesquisa." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Como esses são códigos curtos que usam modelos Jomres, você pode usar o recurso de substituição de modelo para códigos curtos para modificar a saída. Por exemplo, você pode copiar /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete .html para seu diretório theme/template /html/com_jomres e isso se tornará a substituição. Além disso, se, por exemplo, você quiser vários formulários e um diferente dos outros, poderá renomear o arquivo de modelo (por exemplo, search_form_autocomplete.html) em /html/com_jomres para search_form_autocomplete_new.html e use o seguinte shortcode: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Se você quiser usar os códigos de acesso em um arquivo de modelo Jomres, por exemplo, o controle deslizante do herói, será necessário substituir {jomres por {jomres_script e o Jomres analisará os próprios códigos de acesso." );
