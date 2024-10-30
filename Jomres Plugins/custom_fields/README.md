## Introduction

Using this option you can define simple custom fields that will be shown at the bottom of the booking form, for all properties. The fields can be mandatory or not. If a custom field is mandatory, it means that the booking form won`t allow the guest to proceed to the next step if the custom field is not filled in by the guest.

## Usage

### Adding a custom field

Let's say we want to get the guest`s passport number and the booking will not be allowed if this field is not filled in. To do this, we have to create a new field in the booking form, by going through the following steps:

    Click on the "Custom fields" option in your Jomres control panel.
    Click on the "New" button (the one with a small green "+"(plus) sign). You`ll be taken to a new screen where you can add your field by going through the following steps:
    Enter your field`s name (in our case, the name will be "passportnumber"). Make sure the name is alphanumeric (just letters and numbers) and it doesn`t have any special characters or spaces. This name won`t be visible to the visitor and it`s used only for processing the field when submitting the booking form.
    Enter the default value you`d like the field to have when first arriving at the booking form. This is actually the text that will already be filled in the box. If you don`t want anything to be filled in by default, you can leave this box empty.
    Enter the field description. This is the text that will be seen by the guest. In our case, we will write here "Passport number".
    Choose if the field is mandatory or not. In our case it`s a mandatory field, so we have to select "Yes" in the "Required" dropdown box. By default, the selected value is "No".
    Save the new field

### Editing a custom field

To edit a custom field after it's been saved, you have to click on it's name. You'll be taken to a screen similar with the one for adding a custom field, but this time the values will be already filled in. All you have to do is make the desired changes and save.
Deleting a custom field

Proceed the same way as for editing the custom field. When arriving to the custom field editing screen, click on the trash can icon and the field will be deleted.

### Viewing custom fields values submitted by guests

The information filled in by guests in the custom fields can be viewed from the edit booking screen, in the frontend, in the 'notes' tab.

### Final notes

Using the Custom fields feature you can create additional fields that will be visible only on the booking form. This feature will not help you create custom fields in property details page, property registration page or in any other place. The fields created using this feature are simple text fields and you can`t create dropdowns, checkboxes or other field types.