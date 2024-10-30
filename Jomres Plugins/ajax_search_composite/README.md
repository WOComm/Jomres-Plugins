# Ajax Search Composite

### Introduction

This plugin is used to create ajax driven search forms on your site. 

{{ajax_search_panel.png}}

### Basics

There are lots of different ways that it can be shown in a page. 

Here we use the Jomres ASAModule (Joomla only) plugin to configure the output. 

{{mod_jomres_asamodule.png}}

In Wordpress we can use a shortcode :

```php
[jomres task="ajax_search" params="&ajs_plugin=ajax_search_composite"]
```

We can also add shortcodes to Wordpress template scripts, for example the Sunbearu template has the following in the sunbearu-default.php script:

```php
<?php echo do_shortcode('[jomres task="ajax_search" params="&ajs_plugin=ajax_search_composite"]'); ?>
```

Where-ever you decide to put the search form, you need to give Jomres a div called  asamodule_search_results to put the search results.

```html
<div id="asamodule_search_results">
</div>
```

In Sunbearu this is included in sunbearu-default.php. In Joomla you can install the plg_content_jomres_ajax_search_contentwrapper (Joomla 3 & Joomla 4) which will automatically add those divs around Joomla content for you. 

### Parameters (arguments)

This plugin accepts a lot of arguments that allow you to change it's output without you needing to edit the code of the plugin itself. Visit the shortcodes page for more detailed examples of available shortcode arguments/parameters.

There are settings that you can use in Admin > Jomres > Settings > Site Configuration to configure this plugin's search form. This is fine if you want to show the same form across the entire site.

If, on the other hand, you want to show the form on different pages in different ways, (for example, on one page you may want to only show results from Country A instead of all countries or because you want to apply *prefilters*) then it's better to use a shortcode that looks something like 

```php
[jomres task="ajax_search" params="&ajs_plugin=ajax_search_composite&asc_template_style=multiselect&prefilter_country_code=GB"]
```

### Other plugins using this one

This plugin is used by the Bootstrap 5 Top Panel Composite Search plugin to include the Ajax Search Composite plugin's forms. The Top Panel plugin using the following code to put Ajax Search Composite into it's own template files. 

```
$output['AJAX_SEARCH_COMPOSITE']    = $MiniComponents->specificEvent('06000', 'ajax_search', array('output_now' => false , 'ajs_plugin' => 'ajax_search_composite' ));
```

{{joomla_4_top_panel.png}}

You can use the Top Panel plugin in Wordpress too, however I found that I preferred using shortcodes directly in the template files themselves, having the Top Panel and Ajax Search Composite output in slightly different places.

### Other layouts

Originally this plugin provided a sidebar with checkboxes or buttons. These are still available for Bootstrap 3 based sites but currently they're not available for Bootstrap 5 based sites. Sometime in the future I will update this plugin to provide the sidebar again.


