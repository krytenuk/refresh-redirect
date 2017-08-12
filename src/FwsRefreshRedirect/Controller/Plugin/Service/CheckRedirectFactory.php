<?php

namespace FwsRefreshRedirect\Controller\Plugin\Service;

use Zend\ServiceManager\FactoryInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use FwsRefreshRedirect\Controller\Plugin\CheckRedirect;

/**
 * Description of CheckRedirectFactory
 *
 * @author Garry Childs (Freedom Web Services)
 */
class CheckRedirectFactory implements FactoryInterface
{

    /**
     * ZF3 compatability
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array $options
     * @return CheckRedirect
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CheckRedirect($container->get('httpRefererContainer'));
    }

    /**
     * ZF2 compatability
     * @param ServiceLocatorInterface $container
     * @return CheckRedirect
     */
    public function createService(ServiceLocatorInterface $container)
    {
        return $this($container->getServiceLocator(), CheckRedirect::class);
    }
}
