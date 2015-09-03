<?php
namespace Example;

use ZF\Apigility\Provider\ApigilityProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\Http\Client;
use Example\V1\Rest\Client\ClientEntity;

class Module implements ApigilityProviderInterface
{

    public function onBootstrap($e)
    {
        $app = $e->getTarget();
        $this->sm = $app->getServiceManager();
        $events = $app->getEventManager();
        
        $events->attach(MvcEvent::EVENT_RENDER, array(
            $this,
            'onRender'
        ), 110);
    }

    public function onRender($e)
    {
        $helpers = $this->sm->get('ViewHelperManager');
        $hal = $helpers->get('hal');
        
        $hal->getEventManager()->attach([
            'renderCollection.entity'
        ], array(
            $this,
            'onRenderCollectionEntity'
        ));
        $hal->getEventManager()->attach([
            'renderEntity'
        ], array(
            $this,
            'onRenderCollectionEntity'
        ));
    }

    public function onRenderCollectionEntity($e)
    {
        if ($e->getName() === 'renderEntity') {
            $entity = $e->getParam('entity')->entity;
        } else {
            $entity = $e->getParam('entity');
        }
        
        $player = new $entity();
        
        if ($player instanceof ClientEntity) {
            $contactRepository = $this->sm->get('Example\V1\Rest\Client\ContactRepository');
            $contacts = $contactRepository->findByClId($entity["cl_id"]);
            $entity["contacts"] = $contacts;
        }
    }

    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'ZF\Apigility\Autoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__
                )
            )
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Example\\V1\\Rest\\Client\\ClientResource' => 'Example\\V1\\Rest\\Client\\ClientResourceFactory',
                'Example\V1\Rest\Client\ClientResourceFactory' => function ($sm)
                {
                    return new \Example\V1\Rest\Client\ClientResourceFactory($sm);
                },
                
                'Example\V1\Rest\Client\ContactRepository' => function ($sm)
                {
                    return new \Example\V1\Rest\Client\ContactRepository($sm);
                }
            ),
            
            'invokables' => array(
                'Example\V1\Client\ClientEntity' => 'Example\V1\Rest\Client\ClientEntity'
            )
        );
    }
}