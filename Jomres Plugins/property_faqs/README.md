This plugin allows property managers to create a list of frequently asked questions and answers that can be displayed on the property details page.

You will need to call this script in your Jomres property details template file like so :

{jomres_script property_faqs PROPERTY_UID={UID}}

The plugin will then display the FAQs for that property.

Alternatively, use a shortcode like 

{jomres property_faqs &property_uid=1}

in an article/page or module.

Property Managers can answer FAQ questions in their Settings > FAQs section. Site administrators can modify the default FAQ questions and answers by editing the faq_questions_N.php script(s). Property managers can change questions and answers to suit their own requirements.

You can have custom Faq files in the override directory. These file are property type specific, so if you have a property type with an ID of 20, then create a file in the override directory called faq_questions_20.php and populate that file with default questions for that property type. You can also copy the sample FAQ files from this plugin into that override directory to give your property managers their own questions to populate.

