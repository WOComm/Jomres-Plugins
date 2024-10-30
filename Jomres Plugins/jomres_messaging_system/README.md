The Jomres Messaging Systems is an instant messaging feature that replaces the contact owner feature of Jomres with a system that offers messaging functionality that keeps registered users on your site instead of using Email to talk to their guests. This gives you the power to monitor exchanges between guests and property managers.

It revolves around the concept of "groups". When a guest visits a property and starts a new conversation with that property then a new group is created which consists of any property managers for that property, plus all super property managers.


You will need to install the "API Feature Messages" plugin to use this feature, so please ensure that you have checked and confirmed that your installation is ready to use REST API functionality in Jomres by visiting the REST API test page in the administrator > Jomres > Tools area first.

{{img.png}}

When this button is clicked a new modal opens for the guest.

{{img_1.png}}

If they haven't already messaged the property, then a new conversation is created. Each conversation is a group conversation, property managers for that property, and all super property managers are automatically added to the conversation and they can all reply to it.

{{img_2.png}}

Once the conversation has started then the conversation messages are retained, so guests and managers can stop and start conversations as necessary. All messages are stored in the database in encrypted format.

{{img_chatbox.png}}



--


## Configuration 

Only registered users can use the Jomres Messaging system. This is normal, AirBNB has the same strategy. All conversations are linked to the CMS user's id.

To ensure the smoothest possible flow for users from Registration > Login > Messaging, it's preferable for you to show them a login form.

Login forms are a highly subjective requirement, some sites demand custom registration forms, while others require the lightest possible requirements. Some prefer to offer Social login features and some do not. Because of this, the best solution is for us to allow you to install the login plugin you want to use through the CMS's UI.

### Joomla

Install your preferred login plugin, or use the built-in module and then configure it according to its documentation. Create a module for the login form and make sure that the module is configured to show on all pages. Make a note of the module ID in the modules list page. 

{{img_5.png}}

Once you have done that visit Administrator > Jomres > Settings > Site Configuration > Messaging System tab. Save the id of the module and Jomres will include the module (see customisation to understand what/where/how to change it's output).

{{img_4.png}}

You can find many login extensions here https://extensions.joomla.org/tags/site-access/


### Wordpress

If no other form is configured, Jomres will use the default WordPress login form. You can install your own login form such as in this example :

{{img_3.png}}

Remember to include the square brackets [] 

### Customisation of the login form position.

In this plugin the form is configured to be shown sticky to the side. Jomres does this by inserting the rendered form into (/core-plugins/jomres_messaging_system/templates/bootstrap5/) login_module.html (Joomla) or login_widget.html (WordPress).

By default Jomres shows the login form on the Property Details (e.g. Preview) page or where the contactowner script is called as a shortcode, therefore the login button will normally only show on the Property Details pages. You may decide that you want to show your form somewhere else, in which case you will need to disable this login form and use the CMS's functionality to place the form.

To stop the contactowner script from outputting the form, the easiest way to do that is to override the login_module/login_widget.html file and remove everything NOT inside the curly braces {}. When you do that then the form will be shown wherever the string {TABCONTENT_03_CONTACT_TAB_CONTENT} has been inserted into property_details.html

Once a user is logged in then the login form changes to a Contact Us button which users can click to start messaging the property.

## Messaging System template files

The template files that list conversations speak for themselves.

The "You have a message" alert is shown in message_monitor.html

Conversations are designed to be shown in modals. This allows the guest to close the conversation, look again at the property details and if they want to re-start the conversation. 

The List Conversations template files include code to create modal popups. For more information on those, see https://getbootstrap.com/docs/5.0/components/modal/

The Contact form uses the contact_us_modal.html to generate the modal that is seen on the property details page. This modal, in turn, calls conversation.html which is the template/form which renders the actual conversation. 







