## Introduction

#### From Dictionary.com

    "a brief trip through a place, as a building or a site, in order to view or inspect it:"


## Tour/Activity Management

{{jintour_frontend.png}}

This page allows you to create tours which will be offered on every property's booking form. This is different to Jintour tours created in the frontend, which are always only offered on the page of the property that was active when the Jintour profile was created.


### Discussion

Jintour refers to Jomres Integrated Tours. These are items which can be booked either as part of a hotel booking, or you can create a property/business that's used solely to take bookings for Jintour items. Once installed, you will see the Tours option when choosing property management process in the first page of the property creation page. 

{{admin_jintour.png}}

Jintour allows you to create date and quantity limited optional extras. This functionality is available both to Site Managers and Property Managers. If a Site Manager creates a Jintour item in the administrator area then this will viewable on the booking form of all properties, whereas items created by property managers are only available on their own pages.

{{frontend_tour.png}}

Here is a list of the generated tours.

{{generated_list_of_tours.png}}

And here in the booking form the guest can choose to book a tour.

{{booking_form.png}}




### Tour/Activity Management in more detail

This plugin allows you to create, manage and sell tours/resources centric bookings with Jomres. Basically, guests will book places in a tour. So if we have a tour called 'London Tour by Bus', a guest would be able to book seats in this bus. A tour can be many things, like a cinema, a restaurant, a trip or anything that offers the possibility for a guest to book a place.

Beside places in a tour bus, you could offer table reservations for a restaurant. These options show up on the booking form as extras, but you have more flexibility when configuring them than with normal optional extras. Jintour bookings can be booked as part of a normal hotel's bookings (see below), or you can create 'jintour based' properties, whereby room based bookings are foregone altogether and only Jintour resources are offered in the booking form.

Once jintour is installed, when you create a new property the "property management process" options have a new option : Choose the tours option if you are offering bookings for items that are available on certain dates (eg. tours, tickets to a concert.) If you choose this option, you will create a 'jintour based' property.

### History

There are 3 types of property in Jomres. Rentable properties (like hotels), Realestate properties (properties that cannot be booked) and "Tour" properties. Jintour was originally created to allow hotels to offer resources that needed to be booked on the same booking, e.g. city tours or a car. Unlike food, which you generally don't need to book ahead of time, you're less likely to have many cars available so Jintour was used to book up equipment, or places on a tour that somebody would take while staying at the hotel. These bookings would happen on the same booking form.

In response to client feature requests, we modified Jintour so that some properties would ONLY offer Jintour resources, which is why you can now create properties which are Tour based only. They don't offer rooms, instead they only offer Jintour resources. This is why you first have to create a Jintour based property (called Tours) then create the resources which can be booked for that.

Another name for a Jintour property would be a business. For example a bicycle hire business might have three hire shops in 3 different towns, therefore they'd create three Jintour based properties and then create tours for each of those thee different shops.

### Configuration

Plugin configuration is done from the frontend, when logged in as property manager or super property manager. Receptionists don't have access to jintour plugin settings. The plugin creates a new button called 'Tour/Activity Management' in your Jomres frontend cpanel. Click on this button and you`ll be taken to a new screen where you can creat your tour profiles. Additionally, a new button is added to the administrator's control panel which allows you to add site-wide tours/activities/resources.

### Create a new profile

Let`s say we want to add a 'London by bus' tour that is available only in the weekends of the summer season. Click the new red icon in the manager's toolbar, the red button hint will say "Tour/Activity management". Click on the New button and you'll be taken to a new screen where you can enter your profile (tour) details.

    Profile title: In our case, this will be 'London tour by bus'.
    Description: Here you can write the tour description, what places will be visited, etc.
    Select from the dropdowns how many adult places and how many children places are available in the bus. Select from the dropdown the tax that applies to this tour price.
    Select season start and season end. In our case, we will select 01/06 to 31/08.
    Check the boxes for the days of the week that the tour is available. In our case, the days will be Saturday and Sunday.
    Set the price for one adult.
    Set the price for one children.
    Save the new activity profile and you`ll be taken back to the previous screen where you can see your new tour/activity profile.

Generating tours based on your activity profile settings Once you have created a tour/activity profile you will then need to generate tours/activities based on that profile's settings. Create the tour/activity, then click the Generate button next to that profile to create the tours/activities themselves. Once the tours/activities have been created you will be able to delete individual tours/activities if you wish.
