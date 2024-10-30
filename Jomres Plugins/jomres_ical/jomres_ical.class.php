<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 8
 * @package Jomres
 * @copyright	2005-2015 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class jomres_ical 
	{
    public function __construct() 
		{
        $this->events = array();
        $this->title  = '';
        $this->author = '';
    	}

    /**
     * 
     * Call this function to download the invite. 
     */
    public function generateDownload() 
		{
        $generated = $this->generateString();
		ob_clean();
        header('Expires: Sat, 26 Jul 1997 05:00:00 GMT' ); //date in the past
        header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' ); //tell it we just updated
        header('Cache-Control: no-store, no-cache, must-revalidate' ); //force revaidation
        header('Cache-Control: post-check=0, pre-check=0', false );
        header('Pragma: no-cache' ); 
        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: inline; filename="calendar.ics"');
        header("Content-Description: File Transfer");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . strlen($generated));
        print $generated;
		exit;
    	}

    /**
     * 
     * The function generates the actual content of the ICS
     * file and returns it.
     * 
     * @return string|bool
     */
    public function generateString() 
		{
        $content = "BEGIN:VCALENDAR\r\n"
                 . "VERSION:2.0\r\n"
                 . "PRODID:-//" . $this->author . "//NONSGML//EN\r\n"
                 . "X-WR-CALNAME:" . $this->title . "\r\n"
                 . "CALSCALE:GREGORIAN\r\n";
		
        foreach($this->events as $event) 
			{
			$content .= $this->generateVeventString($event);
        	}
	    $content .= "END:VCALENDAR";
        return $content;
		}
	
	/**
     * Get the start time set for the even
     * @return string
     */
    private function formatDate($date) 
		{   
        return $date->format("Ymd\THis\Z");
    	}

    /* Escape commas, semi-colons, backslashes.
       http://stackoverflow.com/questions/1590368/should-a-colon-character-be-escaped-in-text-values-in-icalendar-rfc2445
     */
    private function formatValue($str) 
		{
        return addcslashes($str, ",\\;");
    	}

    public function generateVeventString($event) 
		{
		$original_uid = $this->formatValue($event['uid']);
		
		// Google calendar would not import ical files where the UID was something simple like a 1. Presumably because it expects UIDs to follow more appropriate guidelines like those in https://www.kanzaki.com/docs/ical/uid.html. Therefore, we'll follow those guidelines to create our own UID.
		
		$datetime = new \DateTime("now", new \DateTimeZone("UTC"));
		$timestamp = $datetime->format(DateTime::ATOM); // Updated ISO8601
		$local_domain = jomresGetDomain();
		
		$full_uid = $timestamp . "-" . $original_uid . "@" . $local_domain;
		
        $created = new DateTime();
        $content = '';

        $content = "BEGIN:VEVENT\r\n"
                 . "UID:{$full_uid}\r\n"
                 . "DTSTART:{$this->formatDate($event['start'])}\r\n"
                 . "DTEND:{$this->formatDate($event['end'])}\r\n"
                 . "DTSTAMP:{$this->formatDate($event['start'])}\r\n"
                 . "CREATED:{$this->formatDate($event['created'])}\r\n"
                 . "DESCRIPTION:{$this->formatValue($event['description'])}\r\n"
                 . "LAST-MODIFIED:{$this->formatDate($event['modified'])}\r\n"
                 . "LOCATION:{$this->formatValue($event['location'])}\r\n"
                 . "SUMMARY:{$this->formatValue($event['summary'])}\r\n"
				 . "URL;VALUE=URI:{$this->formatValue($event['url'])}\r\n"
                 . "SEQUENCE:0\r\n"
                 . "STATUS:CONFIRMED\r\n"
                 . "TRANSP:OPAQUE\r\n"
                 . "END:VEVENT\r\n";
        return $content;
    	}
	}
