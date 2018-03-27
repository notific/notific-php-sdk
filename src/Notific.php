<?php

namespace Notific\PhpSdk;

use GuzzleHttp\Client;
use Notific\PhpSdk\Actions\ManagesPrivateNotifications;
use Notific\PhpSdk\Actions\ManagesPrivateNotificationsRecipients;
use Notific\PhpSdk\Actions\ManagesPublicNotifications;
use Notific\PhpSdk\Actions\ManagesRecipients;
use Notific\PhpSdk\Actions\ManagesTemplates;

class Notific
{
    use MakesHttpRequests,
        ManagesTemplates,
        ManagesRecipients,
        ManagesPublicNotifications,
        ManagesPrivateNotifications,
        ManagesPrivateNotificationsRecipients;

    /**
     * @var string
     */
    public $apiId;

    /**
     * @var string
     */
    public $apiKey;

    /**
     * @var Client
     */
    public $client;

    /**
     * Notific constructor.
     *
     * @param string $apiId
     * @param string $apiKey
     * @param string $url
     */
    public function __construct(string $apiId, string $apiKey, string $url = 'https://api.notific.io/v1')
    {
        $this->apiId = $apiId;
        $this->apiKey = $apiKey;

        $this->client = new Client([
            'base_uri'    => $url.'/'.$apiId.'/',
            'http_errors' => false,
            'headers'     => [
                'Authorization' => 'Bearer '.$this->apiKey,
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
            ],
        ]);
    }

    /**
     * @param array  $collection
     * @param string $class
     *
     * @return array
     */
    protected function transformCollection(array $collection, string $class): array
    {
        $collection['data'] = array_map(function ($attributes) use ($class) {
            return new $class($attributes, $this);
        }, $collection['data']);

        return $collection;
    }
}
