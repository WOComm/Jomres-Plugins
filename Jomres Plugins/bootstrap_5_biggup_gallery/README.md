# Property Big up gallery

[Bootstrap 5 sites only.](https://www.jomres.net/blog/167-don-t-install-bootstrap-5-only-plugins-on-sites-that-aren-t-configured-to-use-bootstrap-5)

### This plugin uses Bootstrap 5 markup to create an image gallery.

[[biggup_gallery.mp4]]


{{biggup_screenshot_1.png}}

When an image is clicked a full screen modal opens up with full size images uploaded to the frontend Media Manager Slideshows area, as a slideshow. 

On the right hand of the page it takes the Pros from the guest reviews and shows them. Currently the threashold for which reviews to show (i.e. the rating score) is configured in *j06000property_biggup_gallery.class.php* :

```php
$rating_threashold = 6;
```


{{biggup_screenshot_2.png}}


This plugin is a modified version of the Bootstrap 5 Carousel plugin. This means that they're not compatible with each other because both provide j01060 scripts which override the default Jomres Core Galleria gallery plugin. If you have both installed, uninstall one of them.

Strictly speaking this plugin isn't compatible with the Bootstrap 5 Property Details templates plugin. This is because those templates have their own carousel galleries that are optimised for wider viewports. These carousels are hard coded into the template files themselves, but you can still incorporate this plugin's output into those template files:

Let's take *property_details_dynamo* as an example. You can replace the existing carousel markup with 

```php
{jomres_script property_biggup_gallery PROPERTY_UID=N}
```

```php
<div class="row full-width">
	<div class="col-sm-8">
		{jomres_script property_biggup_gallery PROPERTY_UID=N}
	</div>
	<div class="col-sm-4">
```

so that it looks like

{{dynamo_biggup.png}}



