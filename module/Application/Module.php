<?php
namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Uri\UriFactory;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        UriFactory::registerScheme('chrome-extension', 'Zend\Uri\Uri');
        
        // Set CORS headers to allow all requests
        $headers = $e->getResponse()->getHeaders();
        $headers->addHeaderLine('Access-Control-Allow-Origin: *');
        $headers->addHeaderLine('Access-Control-Allow-Methods: PUT, GET, POST, PATCH, DELETE, OPTIONS');
        $headers->addHeaderLine('Access-Control-Allow-Headers: Authorization, X-Requested-With, Origin, Content-Type, Accept');
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }
}