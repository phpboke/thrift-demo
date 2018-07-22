<?php
namespace Services\HelloWorld;

error_reporting(E_ALL);

define("THRIFT_ROOT", "/usr/lib/php/");
define("ROOT", "/srv/www/thrift/gen-php/");
require_once THRIFT_ROOT . "Thrift/ClassLoader/ThriftClassLoader.php";

use Thrift\ClassLoader\ThriftClassLoader;

$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift', THRIFT_ROOT);
$loader->registerDefinition('Service', ROOT);
$loader->register();

use Thrift\Exception\TException;
use Thrift\Factory\TTransportFactory;
use Thrift\Factory\TBinaryProtocolFactory;
 
use Thrift\Server\TServerSocket;
use Thrift\Server\TSimpleServer;

try {
    require_once 'TestHandler.php';
    $handler = new \Services\Test\TestHandler();
    $processor = new \Services\Test\TestProcessor($handler);
     
    $transportFactory = new TTransportFactory(); 
    $protocolFactory = new TBinaryProtocolFactory(true, true);
     
    //作为cli方式运行，监听端口，官方实现
    $transport = new TServerSocket('localhost', 9090);
    $server = new TSimpleServer($processor, $transport, $transportFactory, $transportFactory, $protocolFactory, $protocolFactory);
    $server->serve();
} catch (TException $tx) {
    print 'TException: '.$tx->getMessage()."\n";
}