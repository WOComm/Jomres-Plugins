The Extended Maps plugin Lists all properties that have latitude and longitude data stored in their property details, on a Google map. 

Note: Remember that you'll need to save an API key in Admin > Jomres > Settings > Site Configuration > Integrations. Once that's done you can then configure the plugin in the same area, Google Maps tab.

{{settings.png}}

Can work in conjunction with the Local Events plugin. If local events and attractions have been created and they include latitude and longitude details, then they will be shown on the map.

{{example_map.png}}

In this screenshot you can see it used in conjunction with the search widget to create a landing page.

The best way to use this plugin is as a shortcode, so see the shortcodes page for examples.

A direct link to the extended maps is something like

http://www.domain.com/index.php?option=com_jomres&task=extended_maps&lang=en

however you can filter by town by doing something like

http://www.domain.com/index.php?option=com_jomres&task=extended_maps&lang=en&town=derby

(note the town=derby at the end)

You can put this in a shortcode, where the task is extended_maps and the parameters would be "&town=derby".