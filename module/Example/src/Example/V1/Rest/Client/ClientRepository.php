<?php
namespace Example\V1\Rest\Client;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\Paginator\Adapter\DbTableGateway;

class ClientRepository
{

    protected $tableName = 'clients';

    protected $tableGateway;

    public function __construct($adapter)
    {
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new ClientEntity());
        
        $this->tableGateway = new TableGateway($this->getTableName(), $adapter, null, $resultSet);
    }

    public function findAll($params = array())
    {
        $dbTableGatewayAdapter = new DbTableGateway($this->tableGateway);
        return new ClientCollection($dbTableGatewayAdapter);
    }
    
    /**
     * Gets the value of tableName.
     *
     * @return mixed
     */
    public function getTableName()
    {
        return $this->tableName;
    }
    
    /**
     * Sets the value of tableName.
     *
     * @param mixed $tableName
     *            the table name
     *
     * @return self
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    
        return $this;
    }
}