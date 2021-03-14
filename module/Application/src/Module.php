<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;
use Application\Model\Articulos;
use Application\Model\ArticulosTable;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\ModuleManager\Feature\configProviderInterface;

class Module implements configProviderInterface
{
    const VERSION = '3.1.3';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig(){
        return [
            'factories' => [
                Model\ArticulosTable :: class => function ($container){
                    $tableGateway = $container->get(Model\ArticulosTableGateway :: class);
                    return new Model\ArticulosTable($tableGateway);
                },
                Model\ArticulosTableGateway :: class => function ($container){
                        $adapter = $container->get(AdapterInterface::class);
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype( new Model\Articulos);
                        return new TableGateway('Articulos' , $adapter , null , $resultSetPrototype);
                }
            ]
            ];
    }

    public function getControllerConfig(){
        return [
            'factories' => [
                Controller\IndexController::class => function($container){
                       return new Controller\IndexController($container->get(Model\ArticulosTable::class)); 
                }
            ]
        ];
    }
}
