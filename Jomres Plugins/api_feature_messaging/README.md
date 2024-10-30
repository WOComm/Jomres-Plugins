This plugin provides a variety of endpoints that serve as the nexus of the Jomres Messaging System.

It also, silently, creates messaging REST API client id and secrets for registered users. This allows registered users to access the messaging system through the UI (if the messaging plugin is installed). This allows the messaging functionality to offer endpoints to third party systems, as well as basic system users

Like most other endpoints in Jomres it requires the sender to send a valid token as part of the message. This token allows the system to associate the message with a specific registered user. 

If a valid property uid is sent when the thread is created then a group is created with any property managers of that property, and all super property managers as members. 

Otherwise, DMs can be sent to valid users of the site.

When a message is created two types of webhooks are genereated (currently) :

```php
$webhook_notification							   = new stdClass();
$webhook_notification->webhook_event				= 'message_created';
$webhook_notification->webhook_event_description	= 'Logs when a message is created';
$webhook_notification->webhook_event_plugin		 	= 'api';
$webhook_notification->data						 	= new stdClass();
$webhook_notification->data->message_id			   = $message_id;
add_webhook_notification($webhook_notification);
```

for new messages and when a recipient is created

```php
$webhook_notification							   = new stdClass();
$webhook_notification->webhook_event				= 'message_recipient_created';
$webhook_notification->webhook_event_description	= 'Logs when a message is created for a given user id';
$webhook_notification->webhook_event_plugin		 	= 'api';
$webhook_notification->data						 	= new stdClass();
$webhook_notification->data->message_id			   = $this->model->values->id;
$webhook_notification->data->recipient_id		   = $this->model->values->recipient_id;
add_webhook_notification($webhook_notification);
```

A Recipient row is a record in the database that links a recipient (e.g. a property managers/guest) with a message in a many-to-one relationship.

--- 

The number of endpoints is deliberately kept as low as possible, this simplifies this feature. Other features, like emailing recipients, and a UI for guests and managers to use, will be provided in other plugins.



    

