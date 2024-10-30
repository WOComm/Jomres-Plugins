<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

	jr_define('CONVERSATIONS',"Conversations");
	jr_define('CONVERSATION',"You are talking to ");
	jr_define('CONVERASTIONS_GROUPS',"Groups");
	jr_define('CONVERSATIONS_WELCOME_MESSAGE_1',"Hi, welcome to ");
	jr_define('CONVERSATIONS_WELCOME_MESSAGE_2',"How can I help you?");
	jr_define('CONVERSATIONS_PLACEHOLDER',"Enter your message...");
	jr_define('CONVERSATIONS_MEMBERS',"Group members");
	jr_define('CONVERSATIONS_NO_CONVERSATIONS_MANAGER',"There aren't any messages here yet.");
	jr_define('CONVERSATIONS_NO_CONVERSATIONS_GUEST',"There aren't any messages here yet. You can start a new conversation by visiting a property and clicking the contact button for that property.");
	jr_define('CONVERSATION_NAME',"Conversation name");
	jr_define('CONVERSATION_GROUP_ID',"Group id");
	jr_define('CONVERSATION_UNDREAD_MESSAGES',"Unread messages");
	jr_define('CONVERSATION_LAST_MESSAGE',"Last message");
	jr_define('CONVERSATION_LEAVE_GROUP',"Leave group");
	jr_define('LIST_CONVERSATIONS_INFO',"Here you can see a list of conversations. Note, Unread messages refers to messages that you personally have not read, they may have been read, and replied to, by other group members. Click on the conversation name to open the conversation in a new window.");
	jr_define('CONVERSATION_MODAL_TITLE',"Conversation alert");
	jr_define('CONVERSATION_MODAL_NUDGE',"You have new messages.");
	jr_define('CONVERSATION_MODAL_GO',"View Conversations");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_TAB_TITLE',"Messaging system");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_ID',"Joomla login module id");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_DESC'," The id of your login module. See Plugin Infos Plugin for more information on this setting. ");
	jr_define('MESSAGING_SYSTEM_SEARCH_FIELD_PLACEHOLDER',"Search");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_REGISTERED',"Registered user");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_PROPERTY_MANAGER',"Property Manager");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_ADMINISTRATOR',"Administrator");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE',"WordPress login shortcode");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE_DESC',"Your login widget shortcode. See Plugin Infos Plugin for more information on this setting. ");
	jr_define('MESSAGING_SYSTEM_REST_API_LOCATION_WARNING',"Currently your installation of Jomres is in the /wp-content/plugins/jomres/jomres/ directory so you can't use the messaging system yet. Please visit Administrator > Jomres > Tools > Rest API Test page for more information and instructions. To remove this message, either move the files as advised in that page or uninstall the Messaging plugin.");
	jr_define('MESSAGING_SYSTEM_BSVERSION_WARNING',"Sorry, the Jomres Messaging System only works on sites with themes/templates that support Bootstrap 5 and where the Site Configuration > Misc tab > Bootstrap version setting is set to Bootstrap 5 or No Bootstrap in theme.");

