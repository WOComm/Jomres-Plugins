Allows you to add custom fields in the administrator area that property managers can use to add information extra to that normally recorded by the edit property details page. This data is added to a new tab in the property details page, however you must edit the tabcontent_01_custom_property_fields.html yourself, sample data is provided that uses the fields that you create to build the template contents.

On installation a new button called Custom Property Fields is added to the Jomres Admin Cpanel ->Developer Tools section.

Managers will be able to fill in the custom property fields info from Jomres Frontend Cpanel -> Settings-> Other Property Information

{{list_custom_fields.png}}

When you edit a custom property field you'll see something like this

{{edit_custom_field.png}}

As you can see, a field can be configured to only be visible for certain property types.

At the bottom of the page you will see an example section. This is only intended as a guide, it'll be up to you to style the tab template in a way that's suitable for your particular application.

{{tab_markup.png}}

Property Managers are able to modify their property details via the Other Property Information menu option under Settings in their toolbar.

{{property_manager_edit.png}}

This information is then output on various pages, like the search results ( List view, in this example ).

{{custom_property_field_output.png}}