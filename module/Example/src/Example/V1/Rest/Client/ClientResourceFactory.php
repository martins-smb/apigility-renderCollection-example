<?php
namespace Example\V1\Rest\Client;

use Zend\ServiceManager\ServiceLocatorInterface;

class ClientResourceFactory
{

    public function __invoke(ServiceLocatorInterface $serviceManager)
    {
        $repository = new ClientRepository($serviceManager->get('Zend\Db\Adapter\Adapter'));
        
        $resource = new ClientResource();
        $resource->setClientRepository($repository);
        
        return $resource;
    }
}