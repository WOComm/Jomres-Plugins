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

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "検索フォーム要素ガイド" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "検索フォーム要素プラグインをインストールして、ここに表示されているショートコードを使用してサイトに検索フォームを追加します。このページでは、サイトに必要な検索フォームを正確に作成できるように、利用可能なショートコードが表示されます . これらのコードをコピーして、ページ/記事/モジュールに直接貼り付けて、レイアウトの作業を開始できます. ページの下部には、いくつかの検索フォームの例が表示されます. ボタンをクリックしてモーダルを開き、使用します [コピー] ボタンをクリックして、マークアップをクリップボードにコピーします。その後、そのマークアップを記事/モジュールで使用して、検索フォームを作成できます。" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "これらはすべて、検索フォームを作成するときに使用できるショートコードです。" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "例" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "このページのショートコードを使用して、提供されている例を変更したり、例をそのまま使用したりできます。ショートコードや例をページ、記事、またはモジュールにコピー アンド ペーストして、 検索フォーム。" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "検索フォームには、常に form_start、form_button、および form_end ショートコードを含める必要があります。" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "これらは Jomres テンプレートを使用するショートコードであるため、ショートコードのテンプレート オーバーライド機能を使用して出力を変更できます。たとえば、/jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete をコピーできます。 .html を theme/template /html/com_jomres ディレクトリに追加すると、これが上書きされます. さらに、たとえば、複数のフォームと 1 つのフォームを他とは異なるものにしたい場合は、テンプレート ファイルの名前を変更できます (例: search_form_autocomplete.html) /html/com_jomres で search_form_autocomplete_new.html に移動し、次のショートコードを使用します: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Jomres テンプレート ファイル (ヒーロー スライダーなど) でショートコードを使用する場合は、{jomres を {jomres_script に置き換えると、Jomres がショートコード自体を解析します。" );
