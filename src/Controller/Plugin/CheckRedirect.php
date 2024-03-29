<?php

namespace FwsRefreshRedirect\Controller\Plugin;

use Laminas\Mvc\Controller\Plugin\AbstractPlugin;
use Laminas\Session\Container;
use Laminas\Http\Response;

/**
 * CheckRedirect
 * Checks the current controller action against the last call, if they match redirect somewhere else.
 * @see FwsRefreshRedirect\Service\HttpRefererContainerFactory
 * @see FwsRefreshRedirect\Module::onRoute
 * @see FwsRefreshRedirect\Module::onFinish
 *
 * @author Garry Childs (Freedom Web Services)
 */
class CheckRedirect extends AbstractPlugin
{

    /**
     *
     * @var Container
     */
    private $httpRefererContainer;

    /**
     *
     * @param Container $httpRefererContainer
     */
    public function __construct(Container $httpRefererContainer)
    {
        $this->httpRefererContainer = $httpRefererContainer;
    }

    /**
     *
     * @param string $route RouteInterface name
     * @param array $params Parameters to use in url generation, if any
     * @param array $options RouteInterface-specific options to use in url generation, if any
     * @param bool $reuseMatchedParams Whether to reuse matched parameters
     * @return Response|CheckRedirect
     */
    public function __invoke($route = null, Array $params = array(), Array $options = array(), $reuseMatchedParams = false)
    {
        if (is_null($route)) {
            return $this;
        }
        return $this->toRoute($route, $params, $options, $reuseMatchedParams);
    }

    /**
     *
     * @param string $route RouteInterface name
     * @param array $params Parameters to use in url generation, if any
     * @param array $options RouteInterface-specific options to use in url generation, if any
     * @param type $reuseMatchedParams Whether to reuse matched parameters
     * @return Response|void
     */
    public function toRoute($route, Array $params = array(), Array $options = array(), $reuseMatchedParams = false)
    {
        if ($this->shouldRedirect()) {
            $response = $this->getController()->redirect()->toRoute($route, $params, $options, $reuseMatchedParams);
            $response->setStatusCode(303);
            return $response;
        }
    }

    /**
     *
     * @param string $url
     * @return Response|void
     */
    public function toUrl(string $url): Response
    {
        if ($this->shouldRedirect()) {
            $response = $this->getController()->redirect()->toUrl($url);
            $response->setStatusCode(303);
            return $response;
        }
    }

    /**
     * Determine if redirection should take place
     * @return boolean
     */
    private function shouldRedirect(): bool
    {
        $controllerParams = $this->getController()->params()->fromRoute();
        if (array_key_exists('controller', $controllerParams) === false || array_key_exists('action', $controllerParams) === false || $this->httpRefererContainer->refererSet === false) {
            return false;
        }
        
        if ($controllerParams['controller'] == $this->httpRefererContainer->controller && $controllerParams['action'] == $this->httpRefererContainer->action) {
            return true;
        }

        return false;
    }

}
