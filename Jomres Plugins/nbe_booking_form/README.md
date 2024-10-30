The new Jomres Booking engine booking form

The goal of creating the NBE is to develop a clear separation of responsibilities between data collation & storage, API connectivity and the User Interface. The older booking engine was a giant 9k lines monster which was extremely difficult to debug and virtually impossible to add new features to.

Because the NBE relies on the REST API to function, don't forget to visit the admin area REST API Test page to check that your server is properly set up to use the REST API.

It is one of a set of three plugins that make up the New Booking Engine NBE for Jomres. The other two are API Feature Booking and NBE Common, both of which should be installed automatically when this plugin is installed.

The file index.php in this plugin's directory is the booking form. It's designed to be entirely standalone, although to allow it to work through Jomres Shortcodes it can be including within Jomres through an iframe (see j06000nbe_booking_form.class.php)

To allow the form to be triggered this plugin also includes custom versions of j00001functioncall_get_booking_url.class.php and get_booking_url.php


[[nbe_prototype.mp4]]

More information can be found here https://www.jomres.net/blog/technical-blog/176-jomres-headless-booking-engine




