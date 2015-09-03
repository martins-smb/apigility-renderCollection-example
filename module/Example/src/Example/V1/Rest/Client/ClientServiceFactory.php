<?php
namespace Example\V1\Rest\Client;

use Zend\ServiceManager\ServiceLocatorInterface;

class ClientServiceFactory
{

    public function __invoke(ServiceLocatorInterface $serviceManager)
    {
        $repository = new ClientRepository($serviceManager->get('Zend\Db\Adapter\Adapter'));
        
        $service = new ClientService();
        $service->setRepository($repository);
        
        return $service;
    }
}