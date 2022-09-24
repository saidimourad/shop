<?php
namespace App\Service;

use DateTime;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiService
{
    private $client;
   
    public function __construct(HttpClientInterface $client )
    {
        $this->client = $client;
              
    }

   
 public function getApiProducts()
    {
        $response = $this->client->request(
            'GET',
            $_ENV['BASE_URL_API'].'/api/products?display=full&output_format=JSON'
            , [
                'headers' => [
                    'Accept' => 'application/json',
					'Authorization'=>'Basic '.base64_encode( $_ENV['KEY_API']),
                ]]
        );

        return $response->toArray();
    }
   
    public function getApiProductName($name)
    {
        
        $response = $this->client->request(
            'GET',
            $_ENV['BASE_URL_API'].'/api/products?display=full&filter[name]=%['.$name.']%&output_format=JSON'
            , [
                'headers' => [
                    'Accept' => 'application/json',
						'Authorization'=>'Basic '.base64_encode( $_ENV['KEY_API']),
                ]]
        );

        return $response->toArray();
    }
    public function getApiProductDetail($id)
    {
        
        $response = $this->client->request(
            'GET',
            $_ENV['BASE_URL_API'].'/api/products/' .$id.'?output_format=JSON'
            , [
                'headers' => [
                    'Accept' => 'application/json',
					'Authorization'=>'Basic '.base64_encode( $_ENV['KEY_API']),
                ]]
        );

        return $response->toArray();
    }


}

