Install the Search Form Elements Guide and the Search Form Elements Forms plugins to see example forms and shortcodes.

In addition to the shortcodes shown on those pages, you can also have hidden inputs in the form, for example:

{jomres search_form_hidden_field &field=property_type&value=4 }

This allows you to ensure that search results are only returned for a specific property type, without forcing the user to choose a type in the search form. This is useful if you want to show a search form on a page about a specific region or town, for example.



Valid fields (Examples with values from a default Jomres installation):

Fieldname : Example value
-
country :  ES (Spain)

region : 992 (Galicia)

town : Any valid town name, e.g. Valencia

stars : 3

property_type : 1 (Hotel), see the property types page IDs

feature : 3 (Airport) see the property features for the IDs



The search_form_hidden_field shortcode must be after the search_form_start and before the search_form_end shortcodes.

```
{jomres search_form_start}
<div class="row">
	<div class="col-sm-5">
		{jomres search_form_checkin}
	</div>

	<div class="col-sm-5">
		{jomres search_form_checkout}
	</div>
	<div class="col-sm-2">
		{jomres search_form_button &language_context=campsite}
	</div>
</div>
{jomres search_form_hidden_field &field=property_type&value=4}
{jomres search_form_end}
```
---
From v0.7 

Added Search Form Elements onchange templates.

These templates allow drilling down through countries, regions and towns dropdowns.

Note : When the &onchange=1 variable is used, don't mix and match country/region/town shortcodes, only use one of them.

When we do something like

{jomres_script search_form_start &onchange=1}

then we can have sets of shortcodes like these in pages or articles.

```
{jomres_script search_form_start &onchange=1}
{jomres_script search_form_countries}
{jomres_script search_form_end}
```

or

```
{jomres_script search_form_start &onchange=1}
{jomres_script search_form_regions &country=ES}
{jomres_script search_form_end}
```

or

```
{jomres_script search_form_start &onchange=1}
{jomres_script search_form_towns &country=ES&region=994}
{jomres_script search_form_end}
```

As well as being new elements for search forms, the Search Map plugin uses changes in the dropdowns to update the map. This means that you can have a set of shortcodes like these to show a map and dropdowns that will update the map when the dropdowns are changed.

```
{jomres_script search_form_start &onchange=1} 
{jomres_script search_form_countries}
{jomres_script search_form_end}

{jomres search_map}
```


Required : [This changeset](https://github.com/WoollyinWalesIT/jomres/commit/41eeb9b5667ae4632a0c775acf3d49119cdcb024) as the data source for towns needed to be changed to associate towns with regions and countries. If you have updated to the Nightly branch and this isn't working for you, you may need to update the Data Source for towns by going to Administrator > Jomres > Portal > Refresh Data sources. The sources are updated automatically when a property is saved, so you shouldn't normally need to do this.


