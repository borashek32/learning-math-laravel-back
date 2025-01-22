<?php
namespace App\Services\UniSender;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class UnisenderApiWrapper
{
    protected $client;
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => 'https://go1.unisender.ru/ru/transactional/api/v1/',
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-API-KEY' => $apiKey,
            ],
        ]);
    }

    /**
     * Method to make requests to Unisender API
     *
     * @param string $method HTTP (GET, POST и т.д.)
     * @param string $endpoint to make request
     * @param array $data data to send
     * @return array response from API
     */
    protected function makeRequest($method, $endpoint, $data = [])
    {
        try {
            $response = $this->client->request($method, $endpoint, [
                'json' => $data,
            ]);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function sendEmail($data)
    {
        return $this->makeRequest('POST', 'email/send.json', $data);
    }

    public function getLists()
    {
        return $this->makeRequest('GET', 'lists.json');
    }

    public function createList($data)
    {
        return $this->makeRequest('POST', 'lists/create.json', $data);
    }

    public function deleteList($listId)
    {
        return $this->makeRequest('POST', 'lists/delete.json', [
            'list_id' => $listId,
        ]);
    }

    public function addContactsToList($listId, $contacts)
    {
        return $this->makeRequest('POST', 'lists/import.json', [
            'list_id' => $listId,
            'contacts' => $contacts,
        ]);
    }
}
