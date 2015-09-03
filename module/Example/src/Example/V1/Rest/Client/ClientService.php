<?php
namespace Example\V1\Rest\Client;

use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;

class ClientService implements ServiceManagerAwareInterface
{

    protected $serviceManager;

    protected $repository;

    public function getClients($params = array())
    {
        return $this->getRepository()->findAll($params);
    }

    /**
     * Gets the value of serviceManager.
     *
     * @return mixed
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    /**
     * Sets the value of serviceManager.
     *
     * @param mixed $serviceManager
     *            the service manager
     *            
     * @return self
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
        
        return $this;
    }

    /**
     * Gets the value of repository.
     *
     * @return mixed
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * Sets the value of repository.
     *
     * @param mixed $repository
     *            the repository
     *            
     * @return self
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
        
        return $this;
    }
}