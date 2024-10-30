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
jr_define('_CLONE_TARIFFS_TITLE',"Tarifák klónozása");
jr_define('_CLONE_TARIFFS_INFO',"Itt klónozhat egy tarifát egy céltulajdonságról egy forrástulajdonságra. Csak azok a tulajdonságok lesznek elérhetőek, amelyek kezeléséhez jogosultak vagyunk.");
jr_define('_CLONE_TARIFFS_SOURCE',"Forrás tulajdonság");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Klónozási tarifa");
jr_define('_CLONE_TARIFFS_TARGET',"Céltulajdonság");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Céltulajdon szobatípus");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Ha a Target tulajdonság tarifaszerkesztési módja eltér a Forrás tulajdonság tarifaszerkesztési módjától, akkor a klónozás során a Target tulajdonság eredeti tarifái törlődnek, és a tarifaszerkesztési mód megváltozik, hogy tükrözze a Forrás tulajdonságait ingatlan beállítása.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Törli a meglévő tarifákat a céltulajdonon?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Ha a Target tulajdonság tarifaszerkesztési módja megegyezik a Source tulajdonságéval, akkor a meglévő tarifák nem törlődnek. Ezt azonban felülbírálhatja, ha ezt az opciót Igen-re állítja.");