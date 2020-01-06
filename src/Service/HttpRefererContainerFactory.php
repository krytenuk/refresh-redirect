<?php

namespace FwsRefreshRedirect\Service;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Laminas\Session\Container;

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
