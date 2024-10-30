<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 *  @version Jomres 10.3.1
 *
 * @copyright	2005-2022 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

	use League\CommonMark\Environment\Environment;
	use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
	use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
	use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;
	use League\CommonMark\MarkdownConverter;
	use Spatie\CommonMarkHighlighter\FencedCodeRenderer;
	use Spatie\CommonMarkHighlighter\IndentedCodeRenderer;
	use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;

	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * 
	 */

class j16000plugin_infos
{	
	/**
	 *
	 * Constructor
	 * 
	 * Main functionality of the Minicomponent 
	 *
	 * 
	 * 
	 */
	 
	public function __construct($componentArgs)
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}
		$ePointFilepath = get_showtime('ePointFilepath');
		$eLiveSite = get_showtime('eLiveSite');

		// Define your configuration, if needed
		$config = [];

		// Configure the Environment with all the CommonMark and GFM parsers/renderers
		$environment = new Environment($config);
		$environment->addExtension(new CommonMarkCoreExtension());
		$environment->addExtension(new GithubFlavoredMarkdownExtension());
		$environment->addRenderer(FencedCode::class, new FencedCodeRenderer(['html', 'php', 'js']) );
		$environment->addRenderer(IndentedCode::class, new IndentedCodeRenderer());

		$converter = new MarkdownConverter($environment);

		$temp_dir = JOMRES_TEMP_ABSPATH.JRDS.'markdown';

		if (!is_dir($temp_dir)) {
			if (!mkdir($temp_dir)) {
				throw new Exception('Error, unable to create temporary markdown directory '.$temp_dir );
			}
		}

		$plugin_info_files = [];
		foreach ($MiniComponents->miniComponentDirectories as $directory) {
			if ($directory == JOMRES_APP_ABSPATH) {
				$core_minicomponent_dir = JOMRES_APP_ABSPATH;
			} else {
				if (file_exists($directory.JRDS.'README.md')) {
					$bang = explode("/",$directory);
					end($bang);
					$key = key($bang);
					$plugin_name = $bang[$key-1];
					$plugin_friendly_name = ucwords(' '.str_replace('_', ' ', $plugin_name));

					$relative_path = str_replace(JOMRESCONFIG_ABSOLUTE_PATH, get_showtime('live_site').'/',$directory );

					$plugin_info_files[] = [
						'file_full_path' => $directory.'README.md' ,
						'plugin_name' => $plugin_name ,
						'plugin_friendly_name' => $plugin_friendly_name,
						'relative_path' => $relative_path,
						'plugin_directory' => $directory
					];
				}
			}
		}

		$plugin_info_files[] = [
			'file_full_path' => $core_minicomponent_dir.'README.md' ,
			'plugin_name' => 'core_minicomponents' ,
			'plugin_friendly_name' => 'Core Minicomponents',
			'plugin_directory' => $core_minicomponent_dir
		]; // We are going to slide this into the end because....because.

		$output = array();
		$pageoutput = array();
		$rows = [];

		foreach ($plugin_info_files as $file) {
			$contents = file_get_contents($file['file_full_path']);

			// What we will do here is save cache files with the contents of $r, which will be json encoded. The filename will be the same as the original hash of the contents so that we can do a fast comparison and replace it if necessary.

			$contents_hash = md5($contents);
			$sub_dir = JOMRES_TEMP_ABSPATH.JRDS.'markdown'.JRDS.$file['plugin_name'];
			if (!is_dir($sub_dir)) {
				if (!mkdir($sub_dir)) {
					throw new Exception('Error, unable to create temporary markdown directory '.$temp_dir );
				}
			}

			$cache_file = $sub_dir.JRDS.$contents_hash.'.html';
			if (file_exists($cache_file)){
				$cache_contents = file_get_contents($cache_file);
				$cache_contents = json_decode($cache_contents);
				$rows[] = (array)$cache_contents;
			} else {
				emptyDir($sub_dir);
				$r=[];
				$images = array();
				$r['PLUGIN_FRIENDLY_NAME'] = $file['plugin_friendly_name'];
				$r['PLUGIN_NAME'] = $file['plugin_name'];

				$cname = 'plugin_info_'.$file['plugin_name'];

				if (file_exists($file['plugin_directory'].'plugin_info.php')) {
					include_once $file['plugin_directory'].'plugin_info.php';
				}

				if (class_exists($cname)) {
					$plugin_info_class = new $cname();
				} else {
					$plugin_info_class = new stdClass();
				}

				$scripts = array();
				$files = scandir_getfiles($file['plugin_directory']);
				foreach ($files as $script) {
					if (strpos($script,'.class.php')) {
						$scripts[] = ['SCRIPT_NAME' => $script];
					}
				}
				$tmpl = new patTemplate();
				$tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->addRows('pageoutput', $scripts);
				$tmpl->readTemplatesFromInput('scripts.html');
				$r['SCRIPTS'] = $tmpl->getParsedTemplate();

				$markup = $converter->convert($contents);

				if (preg_match_all("~\{\{\s*(.*?)\s*\}\}~", $markup, $arr)) {
					$images = $arr[0];
				}

				if (!empty($images)) {
					foreach ($images as $image) {
						$img_name = str_replace( [ "{{" , "}}" ] , '' , $image );
						$tmpl = new patTemplate();
						$tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
						$tmpl->addRows('pageoutput', [ 0 => [ 'REL_PATH' =>  $file['relative_path'] , 'IMAGE_NAME' => $img_name ]  ]);
						$tmpl->readTemplatesFromInput('images.html');
						$img_html = $tmpl->getParsedTemplate();
						$markup = str_replace ( "{{".$img_name."}}" , $img_html , $markup ) ;
					}
				}

				if (preg_match_all("~\[\[\s*(.*?)\s*\]\]~", $markup, $arr)) {
					$videos = $arr[0];
				}

				if (!empty($videos)) {
					foreach ($videos as $video) {
						if ( $r['PLUGIN_NAME'] != 'core_minicomponents' && !is_null($r['PLUGIN_NAME'])) {
							$img_name = str_replace( [ "[[" , "]]" ] , '' , $video );
							$tmpl = new patTemplate();
							$tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
							$tmpl->addRows('pageoutput', [ 0 => [ 'REL_PATH' =>  $file['relative_path'] , 'VIDEO_NAME' => $img_name ]  ]);
							$tmpl->readTemplatesFromInput('videos.html');
							$img_html = $tmpl->getParsedTemplate();
							$markup = str_replace ( "[[".$img_name."]]" , $img_html , $markup ) ;
						}
					}
				}


				$r['PLUGIN_DATA_NAME'] = '';
				if (isset($plugin_info_class->data['name'])) {
					$r['PLUGIN_DATA_NAME'] = $plugin_info_class->data['name'];
				}

				$r['PLUGIN_DATA_CATEGORY'] = '';
				if (isset($plugin_info_class->data['category'])) {
					$r['PLUGIN_DATA_CATEGORY'] = $plugin_info_class->data['category'];
				}

				$r['PLUGIN_DATA_VERSION'] = '';
				if (isset($plugin_info_class->data['version'])) {
					$r['PLUGIN_DATA_VERSION'] = $plugin_info_class->data['version'];
				}

				$r['PLUGIN_DATA_MARKETING'] = '';
				if (isset($plugin_info_class->data['marketing'])) {
					$r['PLUGIN_DATA_MARKETING'] = $plugin_info_class->data['marketing'];
				}

				$r['PLUGIN_DATA_DESCRIPTION'] = '';
				if (isset($plugin_info_class->data['description'])) {
					$r['PLUGIN_DATA_DESCRIPTION'] = $plugin_info_class->data['description'];
				}

				$r['PLUGIN_DATA_TYPE'] = '';
				if (isset($plugin_info_class->data['type'])) {
					$r['PLUGIN_DATA_TYPE'] = $plugin_info_class->data['type'];
				}

				$r['PLUGIN_DATA_LASTUPDATE'] = '';
				if (isset($plugin_info_class->data['lastupdate'])) {
					$r['PLUGIN_DATA_LASTUPDATE'] = $plugin_info_class->data['lastupdate'];
				}

				$r['PLUGIN_DATA_MIN_JOMRES_VER'] = '';
				if (isset($plugin_info_class->data['min_jomres_ver'])) {
					$r['PLUGIN_DATA_MIN_JOMRES_VER'] = $plugin_info_class->data['min_jomres_ver'];
				}

				$r['PLUGIN_DATA_MANUAL_LINK'] = '';
				if (isset($plugin_info_class->data['manual_link'])) {
					$r['PLUGIN_DATA_MANUAL_LINK'] = $plugin_info_class->data['manual_link'];
				}

				$r['PLUGIN_DATA_CHANGE_LOG'] = '';
				if (isset($plugin_info_class->data['change_log'])) {
					$r['PLUGIN_DATA_CHANGE_LOG'] = $plugin_info_class->data['change_log'];
				}

				$r['PLUGIN_DATA_HIGHLIGHT'] = '';
				if (isset($plugin_info_class->data['highlight'])) {
					$r['PLUGIN_DATA_HIGHLIGHT'] = $plugin_info_class->data['highlight'];
				}

				$r['PLUGIN_DATA_RETIRED'] = jr_gettext( '_JOMRES_COM_MR_NO' , '_JOMRES_COM_MR_NO' , false , false);

				if (isset($plugin_info_class->data['retired']) && $plugin_info_class->data['retired'] == '1' ) {
					$r['PLUGIN_DATA_RETIRED'] = jr_gettext( '_JOMRES_COM_MR_YES' , '_JOMRES_COM_MR_YES' , false , false);
				}


				// Let's allow Jomres shortcodes without the shortcode parsers trying to bugger things up.
				$markup = str_replace ( "{" , "&#123;" , $markup);
				$markup = str_replace ( "}" , "&#125;" , $markup);

				$r['MARKUP'] =  $markup;
				$r['LOCATION'] = $file['plugin_directory'];
				$r['_JOMRES_COM_A_CLICKFORMOREINFORMATION'] = jr_gettext( '_JOMRES_COM_A_CLICKFORMOREINFORMATION' , '_JOMRES_COM_A_CLICKFORMOREINFORMATION' , false , false);
				$rows[]=$r;
				file_put_contents($cache_file, json_encode($r));
			}
		}

		$output['JOMRES_PLUGIN_INFOS'] = jr_gettext( 'JOMRES_PLUGIN_INFOS' , 'JOMRES_PLUGIN_INFOS' , false);
		$output['JOMRES_PLUGIN_INFOS_INFO'] = jr_gettext( 'JOMRES_PLUGIN_INFOS_INFO' , 'JOMRES_PLUGIN_INFOS_INFO' , false , false);
		$output['PLUGIN_RELATIVE'] = $eLiveSite;

		$pageoutput[ ] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->addRows('pageoutput', $pageoutput);
		$tmpl->addRows('rows', $rows);
		$tmpl->addRows('rows2', $rows); // In case it's needed by a template
		$tmpl->readTemplatesFromInput('plugin_infos.html');
		$tmpl->displayParsedTemplate();


	}


	public function getRetVals()
	{
		return null;
	}
}
