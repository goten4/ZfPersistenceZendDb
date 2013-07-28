<?php
namespace ZfPersistenceZendDb;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Loader\AutoloaderFactory;
use Zend\Loader\StandardAutoloader;

define('ZFP_ZENDDB_MODULE_BASE_DIR', dirname(dirname(__DIR__)));

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                ZFP_ZENDDB_MODULE_BASE_DIR . '/autoload_classmap.php',
            ),
            AutoloaderFactory::STANDARD_AUTOLOADER => array(
                StandardAutoloader::LOAD_NS => array(
                    __NAMESPACE__ => __DIR__
                )
            )
        );
    }

    public function getConfig()
    {
        return include ZFP_ZENDDB_MODULE_BASE_DIR . '/config/module.config.php';
    }
}