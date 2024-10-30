This hero slider is intended to be used as a landing page.

{{hero_slider.png}}

By default if it has not been passed a comma seperated list of property uids (&property_uids=1,2,3..) it will instead use the featured properties if the Featured Listings plugin is installed.

To call it in a script file such as index.php of your theme/template you would do 

(Joomla)

run_jomres_shortcode('{jomres bs5_hero_slider &property_uids=1,2,3&slideshow_interval=5000'}) 

or   

(Wordpress)

do_shortcode('[jomres task="bs5_hero_slider" params="&property_uids=1,2,3&slideshow_interval=5000"]'); 

