Allows site admins to charge a commission for each booking made on their website.

Once this plugin has been installed you must visit Admin > Jomres > Settings > Site Configuration > Commission tab and set "Use commission functionality?" to Yes. Once that has been done then a new menu option is added to the administrator toolbar.

{{list_commission_rates.png}}


When a booking is made, a commission fee is added to an invoice that will be issued on the 1st of each month to the property manager that received the booking. That invoice will contain all commission fees for all bookings the manager received during the past month.

If the manager doesn't pay the commission invoice to the site admin paypal account (please see Edit Gateway ( paypal )), then the manager account is suspended and all his properties unpublished until the invoice is paid (if this option is enabled in Site Configuration - Commission tab). Once the invoice is paid, the manager`s account will be automatically re-enabled and all his properties published.

Commission rates can be created from Jomres Admin Cpanel -> Commission -> List Commission Rates

Then once the commission rates are created, you can assign commission rates to each property from Jomres Admin Cpanel -> Commission -> Assign Commission Rates

From now on, whenever a booking is made, a commission percentage or flat rate will be added to the manager`s invoice that will be issued on the 1st of each month. Commission invoices are issued automatically by the Jomres Pseudocron functionality.

Commission invoices can be seen in Jomres Admin Cpanel -> Invoices -> Invoices. Site admins can also see commission invoices that were not issued yet by using the Filter option on this page and selecting Invoice Type: Unissued.
