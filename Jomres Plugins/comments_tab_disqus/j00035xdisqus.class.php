<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j00035xdisqus
	{
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		
		$this->retVals = '';

		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
		
		if (!isset($jrConfig['disqus_shortname']) || trim($jrConfig['disqus_shortname']) == '') {
			return;
		}

		$disqus_code = '
		<div id="disqus_thread"></div>
			<script type="text/javascript">
				/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
				var disqus_shortname = \''.$jrConfig['disqus_shortname'].'\'; // required

				/* * * DON\'T EDIT BELOW THIS LINE * * */
				(function() {
					var dsq = document.createElement(\'script\'); dsq.type = \'text/javascript\'; dsq.async = true;
					dsq.src = \'//\' + disqus_shortname + \'.disqus.com/embed.js\';
					(document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(dsq);
				})();
			</script>
			
			<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
			<a href="http://disqus.com" class="dsq-brlink"><span class="logo-disqus">'.jr_gettext('_JOMRES_CUSTOMCODE_DISQUS_POWEREDBY',"Comments by Disqus",false).'</span></a>
		';
		
		$anchor = jomres_generate_tab_anchor("disqus");
		$tab = array(
			"TAB_ANCHOR"=>$anchor,
			"TAB_TITLE"=>jr_gettext('_JOMRES_CUSTOMCODE_DISQUS_TITLE',"Comments",false,false),
			"TAB_CONTENT"=> $disqus_code
			);
		$this->retVals = $tab;
		}

	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JOMRES_CUSTOMCODE_DISQUS_TITLE',"Comments");
		$output[]=jr_gettext('_JOMRES_CUSTOMCODE_DISQUS_POWEREDBY',"Comments by Disqus");

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}

	}
