<?php
namespace Icecave\Flax;
require_once __DIR__ . '/../../guzzleHttp/src/Client.php';
use GuzzleHttp\Client;

class HessianClientFactory
{
    /**
     * @param string $url
     */
    public function create($url)
    {
        $config['base_uri']=$url;
        $httpClient = new Client($config);
        $httpClient->setUserAgent(
            sprintf('Flax/%s', PackageInfo::VERSION)
        );

        $httpClient->setDefaultOption(
            'headers/Content-Type',
            'x-application/hessian'
        );

        return new HessianClient($httpClient);
    }
}
