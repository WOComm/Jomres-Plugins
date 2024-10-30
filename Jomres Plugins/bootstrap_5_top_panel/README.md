This plugin is designed to be used at the very top of a page. 


{{top_panel.png}}

It offers a currency selection modal and various buttons that prompt users to login/register and links to their property management pages if they're managers.

{{currency_selection.png}}

You must set an Open Exchange Rates API Key in Site Configuration > Integrations and ensure that in the Currency Conversions tab that the "Use conversion functionality" option is set to Yes.

This plugin can be used as a shortcode, however I have used it slightly differently in the Quickstarts.

In the WordPress Quickstart I have added this to the navbar-nav.php file :

```php
<?php echo do_shortcode('[jomres task="bs5_top_panel"]'); ?>
```

and in the Joomla Bootstrap 5 Sunbearu index.php I did this :

```php
$top_panel_shortcode = '{jomres bs5_top_panel}';
$top_panel = run_jomres_shortcode( $top_panel_shortcode );
<?php echo $top_panel;?>
```

This means that the top panel buttons are always visible, regardless of other settings.





