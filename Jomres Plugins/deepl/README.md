## Introduction

The Jomres DeepL plugin is used to provide automatic machine translations for all language file and user generated content within the Jomres system.

## What is DeepL?

DeepL is a new translation service that is fast gaining a reputation for being extremely accurate at translating. It's not, unfortunately, free, but it is in our opinion very reasonably priced.

## How does this plugin work?

Very briefly put, labels and content are checked before display to see if there is a custom string available for that text. If there isn't the plugin will automatically contact DeepL and create new custom strings for the content, then save that content locally.

## In more detail

All labels and content are parsed through a function called jr_gettext, and every content item has an identifier, known as a definition. Before the content is returned to the calling script the jr_gettext supporting classes will check to see if there's a custom string for that definition in the database. If there is, then that string is used. This works for both labels and user generated content such as property descriptions, terms and conditions etc.

If there is no customisation of the string then the plugin will contact the DeepL service, pull down a translation for the string, store it in the custom text table, then output that. The advantage of this approach is that content is translated as needed, and then stored locally meaning that after the initial pull is done, then subsequent requests for that definition are done quickly. It also means that you can customise translations once they have been stored locally in case you notice that they are not perfect (no machine translation service is likely to be in the near future, but DeepL gets reasonably close).

## Configuration

Once you have installed the plugin you need to visit Administrator > Jomres > Settings > Site Configuration > Integrations  and save your DeepL API key

{{img.png}}

## Usage

Once the plugin has been installed and the api key saved, you shouldn't need to do anything else except maintain the translations.

This can be done through the Label Editing page in Administrator > Jomres > Translations or for user generated content, by visiting the Property Details page when logged in as a manager for that property, or as a super property manager.