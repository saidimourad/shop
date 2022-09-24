<?php

namespace App\Service;
use Twig\TwigFilter;

use Twig\Extension\AbstractExtension;

class FileExist extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('file_exists', [$this, 'file_exists']),
        ];
    }


   public function file_exists($filename)
    {

/*
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $filename);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        $headers = curl_getinfo($ch);
        curl_close($ch);
		

    
        return $headers['http_code'];
*/
	//file_get_contents('https://8I9SNSSLPNP2C93WKEXYVYGQ1S34PC7M@la-mode.shop/api/');
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_VERBOSE, false);
    curl_setopt($ch, CURLOPT_USERPWD, $_ENV['KEY_API'] . ':');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://la-mode.shop/api/');
   //return $ch;
    $data = curl_exec($ch);
	$headers = curl_getinfo($ch);
	curl_close($ch);
	return $headers['http_code'];
        


    }
}