Channel Management is used to allow your properties to share their bookings with Online Travel Agencies such as booking.com, expedia and others.

To share bookings between Jomres and Beds24 you must first link properties. This is done through the Beds24v2 plugin that can be installed through the Jomres Plugin Manager. Once properties are linked then bookings are automatically imported and exported as they are created in Jomres and the OTAs.


Note : Your Jomres installation should be accessible through a fully qualified domain name (e.g. not "localhost"), and your Jomres menu option should NOT be password protected. If either of these two requirements are not met then Beds24 will not be able to send you booking notifications.

## Installation

Install the plugin thru the Jomres Plugin Manager, the same way as you would any other Jomres plugin.

When the plugin is first installed, you will see this message :

{{beds24_01.png}}

You should NOT ignore this warning. instead, click the Reset keys option to ensure that property managers all have unique API keys before they attempt to connect their properties to Beds24.

## Users

When properties are added to Beds24, the Jomres API key is stored in Beds24 so that the manager can only affect those properties that they have created.

{{beds24_02.png}}

As you can see in this screenshot, I have one manager with one property currently in Jomres. In the following steps you will see how to connect this manager's property with Beds24 ( the Jomres property will be exported to Beds24 ) and also one property in their Beds24 account, which will be imported into Jomres.

NEW FOR Jomres 9.11.2

I am experimenting with a new feature which allows you to have a Master API key for connecting with Beds24. In the Administrator area > Jomres > Settings > Integrations there is a new option to save and use a master key that allows all integrations with Beds24 to be performed through one Beds24 user.



*IF YOU ALREADY HAVE AN INSTALLATION OF JOMRES WITH PROPERTIES LINKED TO BEDS24 READ THE ENTIRE DESCRIPTION HERE. By default Jomres is designed to be a multi-vendor booking platform. Managers who have their own beds24 accounts can import their properties to and from beds24 securely. This setting allows you to override that functionality by having a single api key for all properties. This means that you only need one account with Beds24 however it also means that all charges will be accrued by that one account. Any manager with access to a property will be able to send updates to the Beds24 property. Leave blank to ignore this setting and force property managers to use their own Beds24 accounts. The API key can take any form you want, so long as the key here matches the one in the [API Key 1](https://www.beds24.com/control2.php?pagetype=accountpassword) field. IF YOU ALREADY HAVE AN INSTALLATION OF JOMRES WITH PROPERTIES LINKED TO BEDS24 : You can switch to using this feature, however it would require that you first truncate (empty) these tables, and that you then re-import the properties from Beds24 into Jomres.*

## Connecting with Beds24

Log into the frontend as the property manager, you will see the "Channel Management (Beds24)" option in the settings menu.

{{beds24_03.png}}

When I click on the menu option, because this property manager has not previously been linked with Beds24, I will see this message :

{{beds24_04.png}}

First COPY the API key into your clipboard, then click on the blue highlighted text that says "Beds24's website here". This will open up a new tab in your browser and you will be taken to the Beds24 Account Password page in their control panel.

Scroll down until you see the API Key 1 field :

{{beds24_05.png}}

Paste in the key from the clipboard, then click Save. You can now close this tab and return to the previous one.

Click the Next button

{{beds24_07.png}}


## Beds24 property linking

The next page is the page you will normally see when you visit the Channel Management (Beds24) page. It allows you to link any properties you may have in Jomres with Existing ones in Beds24, or Import/Export properties from and to your Beds24 account.

The first panel you will see is for the REST API keys :

{{beds24_08.png}}

You can ignore this panel for now. Beds24 do not yet access Jomres through the Jomres REST API, however this information is available once their service is capable of doing that.
Property sharing/linking

Further down you will see the section that allows you to import and/or export properties.

{{beds24_07.5.png}}

As you can see from this screenshot there are buttons that allow you to export the "testHotel" from Jomres into Beds24, and an import button that allows us to import the property called "Property already on Beds24" into Jomres.

Before we export testHotel to Beds24, we will need to ensure that we already have rooms and prices created for it.

{{beds24_09.png}}

We have, so we will go ahead and export this property to Beds24.

## View Property

After clicking the Export button, you will see the property list changes to show the property names and a new button appears called "View Property"

{{beds24_10.png}}

Clicking on the View Property button takes us to a new page


## Room type linking

The first thing you see on this page is the Room Type linking section

{{beds24_10.5.png}}

You wouldn't normally need to make changes to this section. Newly created rooms in Jomres should automatically be exported to Beds24, however if this hasn't happened for some reason, or because you want to change the room types linked, you can modify the associations in this section.

## Notification url

The next section is for the notication url that is stored in Beds24

{{beds24_11.png}}

You cannot manually change the information in this input, it's here to allow you to copy and paste the notification url from Jomres into Beds24, which you will need to do if you imported this property from Beds24 and into Jomres.

If you did import the property, then copy the url into your clipboard then click on the Direct Link button, a new tab will open in the browser and you will be taken to a page in your Beds24 account that looks like this :

{{beds24_12.png}}

Note that whilst the urls displayed here show "localhost", this is not a valid domain and you cannot install the plugin into your "localhost" installation and expect notifications FROM beds24 to Jomres to work. Notifications from Jomres TO Beds24 would however work and bookings can be exported from Jomres to Beds24. In reality you would need your Jomres installation to be hosted on a fully qualified domain.

## Property API key

The Property API key section is for information purposes.

{{beds24_13.png}}

## Bookings Import/Export

The final section on the page offers two buttons, one to import bookings, one to export bookings.

When a property is imported or exported to Beds24 bookings themselves are not automatically imported or exported. You can do that using these buttons, if you wish, to ensure that the two systems are in sync. Once you have done this once, you will not need to do it again, this is purely part of the initial setup routine.

{{beds24_14.png}}

## Import a property

Importing a property from Beds24 into Jomres is very similar, but there is one small difference in the steps.

{{beds24_15.png}}

When you click the Import button the next page will look like this :

{{beds24_16.png}}

On the left hand site you will see the room types as they are stored in Beds24.

On the right hand side you will need to choose the correct room types from the dropdown that correspond with the room types as stored in the Jomres installation. It is very important that each room type in Beds24 be connected to a different room type in Jomres, so do NOT, for example, link all the different room types with just one Jomres room type like "Double room", each should be different. If you do not do this then bookings behaviour will be unpredictable. If you do somehow get this wrong, it can be fixed as described up above in the View Property -> Room type linking section.

Once  you have linked properties, you should not need to do anything else. Jomres will receive and send booking notifications to the channel manager, and the channel manager will forward these notifications on to the OTAs.


## Tariff exporting

If you have a lot of complex tariffs then Jomres will not be able to automatically export complex tariffs into Beds24, however you can easily export them manually to specific tariff&rate slots in Beds24. You will need to enable the Enhanced Daily Prices function in Beds24 first.

First of all you need to ensure that your property is setup to use the Micromanage tariff editing mode, and that you have some tariffs.

Next, ensure that the automatic export feature in this setting is set to No

{{beds24_17.png}}


Now when you are on the display property page you will see this section :

{{beds24_18.png}}

For each tariff you want to export, click on the numbered button, P1 thru P10 to export it into that specific slot in Beds24.
