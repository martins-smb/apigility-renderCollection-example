<?php
namespace Example\V1\Rest\Client;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ClientResource extends AbstractResourceListener
{

    protected $repository;

    /**
     * Fetch all or a subset of resources
     *
     * @param array $params            
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        return $this->getClientRepository()->findAll($params);
    }

    public function getClientRepository()
    {
        return $this->repository;
    }

    public function setClientRepository($repository)
    {
        $this->repository = $repository;
        
        return $this;
    }
}