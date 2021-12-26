<?php

namespace FwsRefreshRedirect\Controller\Plugin\Service;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;
use FwsRefreshRedirect\Controller\Plugin\CheckRedirect;

/**
 * Description of CheckRedirectFactory
 *
 * @author Garry Childs (Freedom Web Services)
 */
class CheckRedirectFactory implements FactoryInterface
{

    /**
     * Create redirect controller plugin
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array $options
     * @return CheckRedirect
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CheckRedirect($container->get('httpRefererContainer'));
    }

}
