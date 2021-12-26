<?php

namespace FwsRefreshRedirect\Service;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;
use Laminas\Session\Container;

/**
 * Description of HttpRefererContainerFactory
 *
 * @author Garry Childs (Freedom Web Services)
 */
class HttpRefererContainerFactory implements FactoryInterface
{

    /**
     * Create http referer session container
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array $options
     * @return Container
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Container('httpReferer');
    }

}
