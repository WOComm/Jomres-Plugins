<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2011 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

function getDeliciousButton($title, $link, $style)
	{
	$img_url = $style. "/delicious.png";

	return '<a href="http://del.icio.us/post?url=' . $link . '&amp;title=' . $title . '" title="Share to Delicious" target="_blank" >
	<img src="' . $img_url . '" alt="Share to Delicious" />
	</a>';
    }

function getDiggButton($title, $link, $style)
	{
	$img_url = $style . "/digg.png";

	return '<a href="http://digg.com/submit?url=' . $link . '&amp;title=' . $title . '" title="Share to Digg" target="_blank" >
	<img src="' . $img_url . '" alt="Share to Digg" />
	</a>';
    }

function getFacebookButton($title, $link, $style)
	{
	$img_url = $style . "/facebook.png";

	return '<a href="http://www.facebook.com/sharer.php?u=' . $link . '&amp;t=' . $title . '" title="Share to Facebook" target="_blank" >
	<img src="' . $img_url . '" alt="Share to Facebook" />
	</a>';
    }

function getGoogleButton($title, $link, $style)
	{
	$img_url = $style . "/google.png";

	return '<a href="http://www.google.com/bookmarks/mark?op=edit&amp;bkmk=' . $link . '" title="Share to Google Bookmarks" target="_blank" >
	<img src="' . $img_url . '" alt="Share to Google Bookmarks" />
	</a>';
    }

function getStumbleuponButton($title, $link, $style)
	{
	$img_url = $style . "/stumbleupon.png";

	return '<a href="http://www.stumbleupon.com/submit?url=' . $link . '&amp;title=' . $title . '" title="Share to Stumbleupon" target="_blank" >
	<img src="' . $img_url . '" alt="Share to Stumbleupon" />
	</a>';
    }

function getTechnoratiButton($title, $link, $style)
	{
	$img_url = $style . "/technorati.png";

	return '<a href="http://technorati.com/faves?add=' . $link . '" title="Share to Technorati" target="_blank" >
	<img src="' . $img_url . '" alt="Share to Technorati" />
	</a>';
    }

function getTwitterButton($title, $link, $style)
	{
	$img_url = $style . "/twitter.png";

	return '<a href="http://twitter.com/share?text=' . $title . "&amp;url=" . $link . '" title="Share to Twitter" target="_blank" >
	<img src="' . $img_url . '" alt="Share to Twitter" />
	</a>';
    }

function getLinkedInButton($title, $link, $style)
	{
	$img_url = $style . "/linkedin.png";

	return '<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=' . $link .'&amp;title=' . $title . '" title="Share to LinkedIn" target="_blank" >
	<img src="' . $img_url . '" alt="Share to LinkedIn" />
	</a>';
    }

function getGooglePlusButton($title, $link, $style)
	{
	$img_url = $style . "/googleplus.png";

	return '<a href="https://m.google.com/app/plus/x/?v=compose&content=' . $title . ' ' . $link . '" title="Share to Google Plus" target="_blank" >
	<img src="' . $img_url . '" alt="Share to Google Plus" />
	</a>';
    }

function getGooglePlusOneButton($lang)
	{
	$language=explode(",",$lang);
	$lang=$language[0];
	return '<script type="text/javascript" src="https://apis.google.com/js/plusone.js">{"lang": "'.$lang.'"}</script><g:plusone annotation="none"></g:plusone>';
    }

function getShortURL($url)
	{
	$data = '';

	try 
		{
		$uri = 'http://tinyurl.com/api-create.php?url='.$url;

		$client = new GuzzleHttp\Client();

		logging::log_message('Starting guzzle call to '.$uri, 'Guzzle', 'DEBUG');
		
		$data = $client->request('GET', $uri)->getBody()->getContents();
		}
	catch (Exception $e) 
		{
		$jomres_user_feedback = jomres_singleton_abstract::getInstance('jomres_user_feedback');
		$jomres_user_feedback->construct_message(array('message'=>'Could not get short url', 'css_class'=>'alert-danger alert-error'));
		}

	return $data;
	}
