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


	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "搜索表单元素指南" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "安装搜索表单元素插件，使用此处显示的简码将搜索表单添加到您的网站。此页面显示您可以使用哪些简码，以便您可以准确构建您网站所需的搜索表单 .您可以复制这些代码并将它们直接粘贴到您的页面/文章/模块中并开始进行布局。在页面底部您将看到许多示例搜索表单。单击按钮打开模式，然后使用 复制按钮将标记复制到剪贴板。然后您可以在文章/模块中使用该标记来创建搜索表单。" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "这些是您在构建搜索表单时可用的所有简码。" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "例子" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "您可以使用此页面中的任何简码来修改提供的示例，或按原样使用示例。将简码和/或示例复制并粘贴到页面、文章或模块中以查看 搜索表单。");

jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "您必须始终在搜索表单中包含 form_start、form_button 和 form_end 简码。" );
jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "因为这些是使用 Jomres 模板的简码，您可以使用简码的模板覆盖功能来修改输出。例如，您可以复制 /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete .html 到您的主题/模板 /html/com_jomres 目录，这将成为覆盖。此外，例如，如果您想要多个表单并且一个与其他表单不同，那么您可以重命名模板文件（例如 search_form_autocomplete.html） 在 /html/com_jomres 到 search_form_autocomplete_new.html 然后使用以下简码：{jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "如果你想在 Jomres 模板文件中使用短代码，例如英雄滑块，那么你需要用 {jomres_script 替换 {jomres，Jomres 将自己解析短代码。" );