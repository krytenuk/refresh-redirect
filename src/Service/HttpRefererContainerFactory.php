<?php

namespace FwsRefreshRedirect\Service;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Session\Container;

/**
 * Description of HttpRefererContainerFactory
 *
 * @author Garry Childs (Freedom Web Services)
 */
class HttpRefererContainerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Container('httpReferer');
    }

}
