<?php
namespace Example\V1\Rest\Client;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\AbstractTableGateway;

class ContactRepository extends AbstractTableGateway
{

    protected $table = 'contacts';

    public function __construct(ServiceLocatorInterface $serviceManager)
    {
        $this->adapter = $serviceManager->get('Zend\Db\Adapter\Adapter');
    }

    public function findByClId($cl_id)
    {
        $resultSet = $this->select(array('ctc_cl_id' => (int) $cl_id));
        
        $contacts = false;
        
        foreach ($resultSet as $row) {
            $contactEntity = new ContactEntity();
            $contactEntity->exchangeArray($row);
            
            $contacts[] = $contactEntity->getArrayCopy();
        }
        
        if ($contacts) {
            $contact["length"] = count($contacts);
        }
        
        return $contacts;
    }
}