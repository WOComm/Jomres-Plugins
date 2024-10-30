<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 19/06/2019 - https://www.valtari.fr
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE',"Ajax Search Composite");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS',"Recherche par étoiles");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES',"Recherche par prix");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES',"Recherche par équipements");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY',"Recherche par pays");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION',"Recherche par région");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN',"Recherche par ville");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE',"Recherche par type de chambre");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE',"Récherche par type d'établisement");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER',"Recherche par nombre de personne(s)/chambre");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES',"Recherche par dates");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE',"Style du template");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC',"Style par défaut : des cases à cocher ou des boutons dans Bootstrap. Style Modale : les boutons (placés en haut de page) se développent en accordéons vers le bas pour permettre aux utilisateurs de sélectionner des filtres de recherche. Style Multi-sélection : listes déroulantes pour révéler les filtres.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS',"Bouttons (orientation verticale)");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS',"Modale (orientation verticae) pour Bootstrap seulement.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION',"Accordéon (orientation horizontale) pour Bootstrap seulement.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT',"Multi-sélection (orientation horizontal) pour Bootstrap seulement.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS',"Afficher les filtres");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS',"Cacher les filtres");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO',"Utilise le framework de recherche ajax. Vous permet de placer un module de recherche proposant une recherche sur la disponibilité, la fourchette de prix, les caractéristiques, le type d’établissement, le type de chambre, le nombre de clients, les étoiles, le pays, la région et la ville dans une barre latérale ou supérieure. Veuillez noter que l'exemple présenté ici ne fonctionnera pas dans certaines demandes, car certains paramètres sont incompatibles ; choisissez simplement ce dont vous avez besoin parmi les filtres disponibles (à l'exception des filtres obligatoires). Ce shortcode est un peu différent de la plupart des autres shortcodes, car il doit être accompagné d'une Div spéciale après la déclaration de shortcode, avec l'ID du asamodule_search_results à l'endroit où le plugin affcihe la réponse à la recherche.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN',"Champ obligatoire. L'argument doit être 'ajax_search_composite'");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE',"Style des champs de recherche. Les options sont : des boutons modaux, en accordéon ou en multi-sélection. Si aucune option n'est renseignée, le plugin utilisera l'option configurée dans la configuration du site. Les options Multi-sélection et Accordéon sont idéales pour l'affichage horizontal. Les deux autres options sont idéales pour le placement dans une barre latérale.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS',"Afficher le formulaire de recherche, si la tâche de page est définie sur viewproperty (la page Descriptif de l'établissement). 0 = NON, 1 = OUI.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS',"Le préfiltre est l'endroit où vous choisissez uniquement les établissements qui satisfont à la condition de préfiltre, et qui peuvent être affichées dans les résultats de recherches. Pré-filtrer par UID d'établissement, seules certaines propriétés peuvent être affichées dans les résultats de recherches. La liste d'UIDs des établissements doit être séparée par des virgules.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES',"Pré-filtrer par type d'établissement ; seuls les établissements de ce(s) type(s) peuvent être affichés dans les résultats de la recherche. Les IDs de type d'établissement doivent être séparés par des virgules.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY',"Pré-filtrer par code de pays ; seules les établisemnts de ces pays peuvent être affichées dans les résultats de la recherche. La liste de codes de pays ISO doit être séparée par des virgules.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION',"Pré-filtrer par nom de région ; seuls les établissements de ces régions peuvent être affichés dans les résultats de la recherche. La liste de noms de régions doit séparée par des virgules et doivent correspondre aux régions stockées dans la base de données. Par exemple, si vous définissez le pays sur Aquitaine en France (FR), les établissements d'autres pays portant des noms identiques ne seront pas affichés.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS',"Activer/Désactiver la saisie d'étoiles dans le formulaire. Sachez que si vous avez défini une option sur NON dans l'onglet Paramètres de recherche composite Ajax de la configuration du site, le paramètre 'asc_by_stars' dans la liste des arguments n'aura aucun effet.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE',"Activer/Désactiver la saisie du prix dans le formulaire. Sachez que si vous avez défini une option sur NON dans l'onglet Paramètres composites de la recherche Ajax de la configuration du site, le paramètre 'asc_by_price' dans la liste des arguments n'aura aucun effet.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES',"Activer/Désactiver la saisie des équipements des établissements dans le formulaire. Sachez que si vous avez défini une option sur NON dans l'onglet Paramètres composites de la recherche Ajax de la configuration du site, le paramètre 'asc_by_features' dans la liste des arguments n'aura aucun effet.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY',"Activer/Désactiver la saisie du pays dans le formulaire. Sachez que si vous avez défini une option sur NON dans l'onglet Paramètres composites de la recherche Ajax de la configuration du site, le paramètre 'asc_by_country' dans la liste des arguments n'aura aucun effet.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION',"Activer/Désactiver la saisie de régions dans le formulaire. Sachez que si vous avez défini une option sur NON dans l'onglet Paramètres composites de la recherche Ajax de la configuration du site, le paramètre 'asc_by_region' dans la liste des arguments n'aura aucun effet.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN',"Activer/Désactiver la saisie de villes dans le formulaire. Sachez que si vous avez défini une option sur NON dans l'onglet Paramètres composites de la recherche Ajax de la configuration du site, le paramètre 'asc_by_town' dans la liste des arguments n'aura aucun effet.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE',"Activer/Désactiver la saisie du type de chambres dans le formulaire. Sachez que si vous avez défini une option sur NON dans l'onglet Paramètres composites de la recherche Ajax dans Configuration du site, le paramètre 'asc_by_roomtype' dans la liste des arguments n'aura aucun effet.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE',"Activer/Désactiver la saisie du type d'établissement dans le formulaire. Sachez que si vous avez défini une option sur NON dans l'onglet Paramètres composites de la recherche Ajax de la configuration du site, le paramètre 'asc_by_propertytype' dans la liste des arguments n'aura aucun effet.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER',"Activer/Désactiver la saisie des numéros de client dans le formulaire. Sachez que si vous avez défini une option sur NON dans l'onglet Paramètres de recherche composite Ajax de la configuration du site, le paramètre 'asc_by_guestnumber' dans la liste des arguments n'aura aucun effet.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE',"Activer/Désactiver la saisie de dates dans le formulaire. Sachez que si vous avez défini une option sur NON dans l'onglet Paramètres composites de la recherche Ajax dans Configuration du site, le paramètre 'asc_by_date' dans la liste des arguments n'aura aucun effet.");

