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

class jomres_tag_cloud {
	function __construct($words)
		{
		$this->url = JOMRES_SITEPAGE_URL.'&send=Search&calledByModule=mod_jomsearch_m0&town=';
		$this->search_on = "property_town";
		$this->wordsArray=array();
		if ($words !== false && is_array($words))
			{
			foreach ($words as $key => $value)
				{
				$this->addWord($value);
				}
			}
		}
		
	
	function addWord($word, $value = 1)
		{
		$word = jr_strtolower($word);
		if (array_key_exists($word, $this->wordsArray))
			$this->wordsArray[$word] += $value;
		else
			$this->wordsArray[$word] = $value;
		return $this->wordsArray[$word];
		}
	
	function setSearchon($search_on)
		{
		$this->search_on = $search_on;
		}
		
	function setURL($url)
		{
		$this->url = $url;
		}
	
	function getCloudSize()
		{
		return array_sum($this->wordsArray);
		}
	
	function getClassFromPercent($percent)
		{
		if ($percent >= 99)
			$class = 1;
		else if ($percent >= 70)
			$class = 2;
		else if ($percent >= 60)
			$class = 3;
		else if ($percent >= 50)
			$class = 4;
		else if ($percent >= 40)
			$class = 5;
		else if ($percent >= 30)
			$class = 6;
		else if ($percent >= 20)
			$class = 7;
		else if ($percent >= 10)
			$class = 8;
		else if ($percent >= 5)
			$class = 9;
		else
			$class = 0;

		return $class;
		}
	
	function shuffleCloud()
		{
		$keys = array_keys($this->wordsArray);
		shuffle($keys);
		if (is_array($keys) && !empty($keys))
			{
			$tmpArray = $this->wordsArray;
			$this->wordsArray = array();
			foreach ($keys as $key => $value)
				$this->wordsArray[$value] = $tmpArray[$value];
			}
		}
		
	function showCloud($returnType = "html")
		{
		$this->shuffleCloud();
		$this->fullCloudSize = $this->getCloudSize();
		$this->max = max($this->wordsArray);

		if (is_array($this->wordsArray))
			{
			$return = ($returnType == "html" ? "" : ($returnType == "array" ? array() : ""));
			foreach ($this->wordsArray as $word => $popularity)
				{
				$linkWord = $word;
				if ($this->search_on == "property_country")
					$linkWord = getSimpleCountry($word);
				else
					$linkWord = str_replace("&#39;","'",$linkWord);
				$sizeRange = $this->getClassFromPercent(($popularity / $this->max) * 100);
				if ($returnType == "array")
					{
					$return[$word]['word'] = $word;
					$return[$word]['sizeRange'] = $sizeRange;
/*					if ($currentColour)
						$return[$word]['randomColour'] = $currentColour;*/
					}
				else if ($returnType == "html")
					{
						$pageoutput = array();
						$output = array();
						$output['SIZERANGE']	= $sizeRange;
						$output['URL']			= $this->url.$word;
						$output['WORD']			= $linkWord;

						$pageoutput[]=$output;
						$tmpl = new patTemplate();
						$tmpl->setRoot( $this->template_path );
						$tmpl->readTemplatesFromInput( "links.html" );
						$tmpl->addRows( 'pageoutput',$pageoutput);
						$return .=	$tmpl->getParsedTemplate();

					//$return .= '<span class="word size'.$sizeRange.'"><a href="'.$this->url.$word.'">'.$linkWord.'</a></span>
					//';
					}
				}
			return $return;
			}
		}
	}
