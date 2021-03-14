<?php
namespace Application\Model;

use Exception;
use Zend\Db\TableGateway\TableGateway;

class ArticulosTable extends TableGateway
{

    const TABLE_NAME = 'articulos';
    const ERROR_INSERT = '<b style="color:red;">ERROR:';
    const ERROR_FIND = '<b style="color:red;">ERROR:';

    function __construct(TableGatewayInterface $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }
    public function findById($id)
    {
        return $this->tableGateway->select(['id' => $id]);
    }
    public function removeById($id)
    {
        return $this->tableGateway->delete(['id' => $id]);
    }
    public function save($data)
    {
        $insert['id'] = $data['id'] ?? NULL;
        $insert['propietario'] = $data['propietario'] ?? NULL;
        $insert['articulo'] = $data['articulo'] ?? NULL;
        $insert['fecha'] = $data['fecha'] ?? NULL;
        if ($this->tableGateway->insert($insert)) {
            return $this->tableGateway->findById($this->tableGateway->getLastInsertValue());
        } else {
            throw new Exception(self::ERROR_INSERT);
        }
    }
}
?>