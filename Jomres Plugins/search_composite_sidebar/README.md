Works with Jomres 10.7 or higher as 10.7 delivers new search result wrapper templates which this plugin uses.

This plugin overrides the Ajax Search Composite template which is designed to show search elements at the top of the page.

Instead, it overrides that plugin's template with it's own version which is designed to be appear as a sidebar. This sidebar will be seen after a guest has performed a search and the results are shown.

If it doesn't appear, check that you haven't overridden search_results_wrapper_top.html and/or search_results_wrapper_bottom.html in your template's html folder.


{{search_composite_sidebar.png}}