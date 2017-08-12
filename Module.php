<?php

namespace FwsRefreshRedirect;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{

    public function onBootstrap(MvcEvent $event)
    {
        $eventManager = $event->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $eventManager->attach(MvcEvent::EVENT_FINISH, array($this, 'onFinish'));
        $eventManager->attach(MvcEvent::EVENT_ROUTE, array($this, 'onRoute'));
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function onRoute(MvcEvent $event)
    {
        $httpRefererContainer = $event->getApplication()->getServiceManager()->get('httpRefererContainer');
        if (!isset($httpRefererContainer->refererSet)) {
            $httpRefererContainer->refererSet = FALSE;
        }
    }

    /**
     * Store controller & action of this request
     * @param MvcEvent $event
     */
    public function onFinish(MvcEvent $event)
    {
        $httpRefererContainer = $event->getApplication()->getServiceManager()->get('httpRefererContainer');
        $httpRefererContainer->controller = $event->getRouteMatch()->getParam('controller');
        $httpRefererContainer->action = $event->getRouteMatch()->getParam('action');
        $httpRefererContainer->routeName = $event->getRouteMatch()->getMatchedRouteName();
        $httpRefererContainer->refererSet = TRUE;
    }

}
