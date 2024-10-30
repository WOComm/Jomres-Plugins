This Messaging System Parser plugin is a vehicle for delivering a number of different parser scripts so that messages saved and displayed can be parsed in a variety of different ways.

This plugin currently contains 5 parser scripts.

* add_property_header_html is a Proof of Concept script for parsing shortcodes which can convert the shortcode into something that's stored in the database. 
* booking_number scans for 8 character strings of numbers and if they exist, check to see if there's a booking with that number. If it exists then the string is converted (before returning the data to the UI) into a link.
* link_property parses a shortcode {property_uid N} into a link to a property.
* The two 08400 scripts parse the group name from {property_name N} and { user_id N} shortcodes into the Property Name and User's name respectively.  


--

The messaging system has a number of different trigger points.

* 08100 Performed before encryption, before the message is saved. A 08100 script would need to import subject and message_body by doing  get_showtime('jms_message_subject') or get_showtime('jms_message_message_body') and after parsing set the same by doing set_showtime('jms_message_subject' , $parsed_result ); or set_showtime('jms_message_message_body' , $parsed_result ); Generally the Jomres Messaging UI doesn't use the subject, just the message_body.

* 08200 Performed after decryption during message retrieval. Same showtime variables and processes as used in the 08100 parsing method.

* 08300 Parsed before saving group name.

* 08400 Parsed before returning group name.