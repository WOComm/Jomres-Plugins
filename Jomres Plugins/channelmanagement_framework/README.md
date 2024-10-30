Trigger aide-memoire

2NNNN Reserved range for Jomres channel manager related functionality (excluding Beds24)

20000 frontend related ranges
20100 Frontend main menu, individual channels can add their own menu items (task items) to the channel_frontend_tasks showtime array.

21000 administrator area features/functions

21001 Channel, report self to framework. Return title and friendly name

21005 framework tasks - channels can hand feature titles, descriptions and links to tasks thru this trigger
21010 channel tasks - channels can hand task titles, descriptions and task links thru this trigger

// 21100 get available channels (unused?)

21150 channel sanity checks

21200 get channel dictionary types

21300 get channel account form fields. FRONTEND Populates the showtime variable channel_form_fields with form names

21310 get channel account form fields. ADMINISTRATOR Populates the showtime variable channel_form_fields with form names. Used by the j10501channelmanagement_framework_site_channel_accounts script to build account forms

27330 Thin channel plugins have a 27330 minicomponent so that they can process individual webhooks

27400 Thin channel scripts that pull changelog items from the remote service and return them to the CMF plugin to be stored and processed



